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
    public $categories = [
        'Cleaning',
        'Landscaping',
        'Home Improvement',
        'Personal Care',
        'Baby sitting',
        'Transportation',
        'Education',
        'Technology'
    ];

    public function run(): void
    {
        foreach($this->categories as $category){
            Category::create(['name'=>$category,'updated_at' => null,'created_at' => date('now'),]);
        }
    }
}
