<?php

namespace App\Http\Controllers;

use App\Http\Filters\ArticleFilters;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

class ArticlesController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                //
            ]
        ]);
    }

    public function index(ArticleFilters $filters)
    {
        return ArticleResource::collection(Article::filter($filters)->paginate(config('app.per_page')));
    }

    public function store(ArticleRequest $request)
    {
        $attributes = array_filter($request->only('title', 'content', 'user_id', 'cate_id'), 'strlen');
        Article::create($attributes);
        return $this->created();
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return $this->success($article);
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $attributes = array_filter($request->only('title', 'content', 'cate_id'), 'strlen');

        if ($attributes) {
            $article->update($attributes);
        }

        return $this->message('编辑成功');
    }

    public function destroy($ids)
    {
        Article::destroy(explode(',', $ids));
        return $this->message('删除成功');
    }
}
