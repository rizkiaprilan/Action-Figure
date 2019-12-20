<?php

use Illuminate\Database\Seeder;

class FigureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=> 'Iron man','price'=>174300,'quantity'=>10,'description'=>'SHFiguarts Action Figure Iron Man Mark 42 + Sofa Tony Stark - Red/Golden','photo'=>'ironman.jpg','category'=>'Action Figure'],
            ['name'=> 'Spiderman','price'=>152100,'quantity'=>20,'description'=>'TAMASHI Spiderman Avengers Infinity War Action Figure - Red/Blue','photo'=>'spiderman.jpg','category'=>'Action Figure'],
            ['name'=> 'Captain America','price'=>134700,'quantity'=>15,'description'=>'SUPERHERO Miniatur Action Figure Karakter Marvel Captain America Avenger Infinity War - N033','photo'=>'captainamerica.jpg','category'=>'Action Figure'],
            ['name'=> 'Hulk','price'=>134700,'quantity'=>5,'description'=>'SUPERHERO Miniatur Action Figure Karakter Marvel Hulk Avenger Infinity War - N033','photo'=>'hulk.jpg','category'=>'Action Figure'],
            ['name'=> 'Black Panther','price'=>133300,'quantity'=>18,'description'=>'Apaffa Action Figure Marvel Avenger Model Black Panther - N033','photo'=>'blackpanther.jpg','category'=>'Action Figure'],
            ['name'=> 'Black widow','price'=>135500,'quantity'=>20,'description'=>'Apaffa Action Figure Marvel Avenger Model Black Widow - N033','photo'=>'blackwidow.jpg','category'=>'Action Figure'],

        ];
        foreach ($data as $d){
            DB::table('figures')->insert([
                'name' => $d['name'],
                'price' => $d['price'],
                'quantity' => $d['quantity'],
                'description' => $d['description'],
                'category' => $d['category'],
                'photo' => $d['photo'],
            ]);
        }
    }
}
