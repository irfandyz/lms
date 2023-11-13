<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Programming','PHP','Flutter','Python','C++','Laravel','Codeigniter','Bootstrap','Marketing','SEO','Bahasa','Bahasa Ingriss','Bahasa Jepang','Bahasa Jerman',
            'Matemarika','Sastra','Saints','Cooking','Komputer'
        ];

        foreach ($data as $value) {
            Category::create([
                'name'=>$value
            ]);
        }
    }
}
