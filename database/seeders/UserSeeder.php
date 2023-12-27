<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use MoonShine\Models\MoonshineUserRole;
use MoonShine\Database\Factories\MoonshineUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MoonshineUserFactory::new()->create([
            'moonshine_user_role_id' => MoonshineUserRole::DEFAULT_ROLE_ID,
            'email' => 'arttema@mail.ru',
            'password' => Hash::make('1234qwerQWER'),
            'name' => 'arttema',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        MoonshineUserFactory::new()->create([
            'moonshine_user_role_id' => MoonshineUserRole::DEFAULT_ROLE_ID,
            'email' => '9268188@gmail.com',
            'password' => Hash::make('1234qwerQWER'),
            'name' => '9268188',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
