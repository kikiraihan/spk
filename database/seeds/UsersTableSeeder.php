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
        factory(App\Model\User::class,5)
        ->create(['password'=>'pulkam'])
        ->each(function($user){
            $user->name= $user->id==1?'Kiki':$user->name;
            $user->email= $user->id==1?'mohzulkiflikatili@gmail.com':$user->email;
            $user->kategori= $user->id==1?'Penilai':$user->kategori;
            $user->kategori=='Penilai'?$user->assignRole('Penilai'):$user->assignRole('Admin');
            $user->save();
        });
    }
}
