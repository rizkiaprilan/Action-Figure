<?php

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['feedback'=> 'Figurenya kurang banyak gans :(','user_id'=>2],

        ];
        foreach ($data as $d){
            DB::table('feedbacks')->insert([
                'feedback' => $d['feedback'],
                'user_id' => $d['user_id'],
            ]);
        }
    }
}
