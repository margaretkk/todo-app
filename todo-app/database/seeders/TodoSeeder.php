<?php

namespace Database\Seeders;

use App\Models\TodoModel;
use Illuminate\Database\Seeder;
use Database\Factories\TodoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TodoModel::factory()->count(5)->create();
    }
}
