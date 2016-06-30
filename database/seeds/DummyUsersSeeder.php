<?php

use Illuminate\Database\Seeder;

use Bebella\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admUser = new User;
        
        $admUser->type = "admin";
        
        $admUser->name = "Isabella Morais";
        $admUser->email = "bebela241199@hotmail.com";
        $admUser->password = bcrypt("senha");
        
        $admUser->save();
        
        $admUser = new User;
        
        $admUser->type = "admin";
        
        $admUser->name = "Diego Rodrigues";
        $admUser->email = "diego.mrodrigues@outlook.com";
        $admUser->password = bcrypt("senha");
        
        $admUser->save();
    }
}
