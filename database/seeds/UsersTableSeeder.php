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
        DB::table('users')->insert([
            'name'              => 'Paulo Augsto',
            'email'             => 'pccesaraugusto@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password'          => bcrypt('123456'),
            'remember_token'    => 'meutoken',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
        ]);
    }
}
