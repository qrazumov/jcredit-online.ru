<?php

use App\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $faker = Faker\Factory::create();
        //DB::table('categories')->truncate();


        for($i = 1; $i < 62; $i++){
           \App\_New::where('id', $i)->update([

                'see_also' => json_encode([mt_rand(1, 62), mt_rand(1, 62),mt_rand(1, 62)]),

            ]);
        }

        // $this->call(UserTableSeeder::class);

    }
}
