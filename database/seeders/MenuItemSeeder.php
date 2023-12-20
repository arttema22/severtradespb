<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItem::create([
            'title' => 'Home',
            'url' => '/',
        ]);

        MenuItem::create([
            'title' => 'About Us',
            'url' => '/about-us',
        ]);

        $services = MenuItem::create([
            'title' => 'Services',
            'url' => '/services',
        ]);

        MenuItem::create([
            'title' => 'Web Development',
            'url' => '/services/web-development',
            'parent_id' => $services->id,
        ]);

        MenuItem::create([
            'title' => 'Mobile Development',
            'url' => '/services/mobile-development',
            'parent_id' => $services->id,
        ]);

        MenuItem::create([
            'title' => 'Contact Us',
            'url' => '/contact-us',
        ]);
    }
}
