<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=> 'Muhammad Fauzi','email'=>'oji@gmail.com','password'=>'123456789','phone'=>'08123456789','gender'=>'male','address'=>'Binus','photo'=>'admin.png','role'=>'admin'],
            ['name'=> 'Muhammad Khairul Akbar','email'=>'akbar@gmail.com','password'=>'123456789','phone'=>'08123456792','gender'=>'male','address'=>'Rawabelong','photo'=>'admin.png','role'=>'admin'],
            ['name'=> 'Budi Setiawan','email'=>'Budi@gmail.com','password'=>'123123123','phone'=>'08123456790','gender'=>'male','address'=>'Binus Center','photo'=>'member.jpg','role'=>'member'],

        ];
        foreach ($data as $d){
            DB::table('users')->insert([
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => Hash::make($d['password']),
                'phone' => $d['phone'],
                'gender' => $d['gender'],
                'role' => $d['role'],
                'address' => $d['address'],
                'photo' => $d['photo'],
            ]);
        }
    }
}
