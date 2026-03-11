<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoboticsKit;

class RoboticsKitSeeder extends Seeder
{
    public function run(): void
    {
        RoboticsKit::create([
            'kit_name' => 'Starter Robotics Kit',
            'description' => 'Basic robotics kit for beginners'
        ]);

        RoboticsKit::create([
            'kit_name' => 'Advanced Robotics Kit',
            'description' => 'Advanced robotics development kit'
        ]);

        RoboticsKit::create([
            'kit_name' => 'AI Robotics Kit',
            'description' => 'Artificial intelligence robotics kit'
        ]);
    }
}