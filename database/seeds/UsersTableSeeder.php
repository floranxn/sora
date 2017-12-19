<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(30)->make();
        User::insert($users->makeVisible(['password'])->toArray());

        $user = User::find(1);
        $user->uname = 'sora';
        $user->email = 'i@sora.com';
        $user->mobile = '17688888888';
        $user->password = bcrypt('sora');
        $user->save();
    }
}
