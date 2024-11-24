<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'=>'steve',
            'email'=>'steve@gmail.com',
            //Hash:make()  hashing /md5/bcrypt/encode/randomUUID()
            'password'=>Hash::make('admin123') ,
            'role'=>'admin'
        ]);
        if($user){
            echo "Successfuly save data";
        }
    }
}
