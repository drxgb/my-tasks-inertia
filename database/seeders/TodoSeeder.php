<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (User::all() as $user)
        {
            /** @var User $user */
            Todo::factory(rand(3, 8))
                ->for($user)
                ->create();
        }
    }
}
