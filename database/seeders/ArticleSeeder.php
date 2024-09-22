<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // initialize faker
       $faker =  Faker::create();
       foreach (range(1,10) as $index) {
        // url facebook.com/post/tips-menggunakan-faker
         Articles::create([
            'title'=> $faker->sentence(5),
            'slug'=> $faker->slug(5),
            'keyword'=> $faker->sentence(5),
            'description'=> $faker->sentence(20),
            // lorempixel.com
            'cover_image'=> $faker->imageUrl(600,300),
            'created_by'=> $faker->name(),
            'updated_by'=>'',
            'is_published'=>1
         ]);

       }
    }
}
