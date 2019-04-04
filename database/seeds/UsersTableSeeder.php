<?php

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
        factory(App\Model\User::class,2)
        ->create(['password'=>'pulkam'])
        ->each(function($user){
            $user->name= $user->id==1?'Kiki':$user->name;
            $user->email= $user->id==1?'mohzulkiflikatili@gmail.com':$user->email;
            $user->save();
        });
    }
}
