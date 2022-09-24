<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Place;
use App\Models\Product;
use App\Models\ProductEntry;
use App\Models\ProductMovimentation;
use App\Models\ProductOutput;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();
        Place::factory(3)->create();
        Product::factory(20)->create();
        ProductEntry::factory(10)->create();
        ProductOutput::factory(10)->create();
        ProductMovimentation::factory(10)->create();
    }
}
