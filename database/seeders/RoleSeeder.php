<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use MoonShine\Models\MoonshineUser;
use MoonShine\Database\Factories\MoonshineUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use MoonShine\Database\Factories\MoonshineUserRoleFactory;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MoonshineUserRoleFactory::new()
            ->has(
                MoonshineUser::factory(3),
            )
            ->create([
                'name' => 'Пользователь',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        MoonshineUserRoleFactory::new()->count(1)
            ->has(
                MoonshineUser::factory(3),
            )
            ->create();
    }
}
