<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['category' => 'Action Figure'],

        ];
        foreach ($data as $d) {
            DB::table('categories')->insert([
                'category' => $d['category'],
            ]);
        }
    }
}
