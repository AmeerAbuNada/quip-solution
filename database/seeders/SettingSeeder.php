<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Home Page Header
        Setting::create([
            'key' => 'header_title_en',
            'value' => 'Excellent Car Washing Solutions',
            'label' => 'Header Title (English)',
            'type' => 'text',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'header_title_ar',
            'value' => 'حلول غسيل سيارات ممتازة',
            'label' => 'Header Title (Arabic)',
            'type' => 'text',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'header_description_en',
            'value' => 'Over 50 years of experience serving service stations and washing centers around the world.',
            'label' => 'Header Description (English)',
            'type' => 'textarea',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'header_description_ar',
            'value' => 'أكثر من 50 عامًا من الخبرة في خدمة محطات الخدمة ومراكز الغسيل حول العالم.',
            'label' => 'Header Description (Arabic)',
            'type' => 'textarea',
            'group' => 'home',
        ]);


        //Home Page About us
        Setting::create([
            'key' => 'about_description_en',
            'value' => '',
            'label' => 'About us Description (English)',
            'type' => 'editor',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'about_description_ar',
            'value' => '',
            'label' => 'About us Description (Arabic)',
            'type' => 'editor',
            'group' => 'home',
        ]);
        

    }
}
