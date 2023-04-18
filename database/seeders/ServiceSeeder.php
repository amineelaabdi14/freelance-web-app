<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\Category;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=User::all();
        $categories=Category::all();
        foreach($users as $user){
            foreach($categories as $category){
                Service::factory()->create(['user_id' => $user->id,"category_id"=>$category->id]);
            }
        }
    }
}
