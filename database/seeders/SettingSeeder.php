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
            'label_en' => 'Header Title (English)',
            'label_ar' => 'عنوان الرئيسية بالإنجليزية',
            'type' => 'text',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'header_title_ar',
            'value' => 'حلول غسيل سيارات ممتازة',
            'label_en' => 'Header Title (Arabic)',
            'label_ar' => 'عنوان الرئيسية بالعربية',
            'type' => 'text',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'header_description_en',
            'value' => 'Over 50 years of experience serving service stations and washing centers around the world.',
            'label_en' => 'Header Description (English)',
            'label_ar' => 'وصف الرئيسية بالإنجليزية',
            'type' => 'textarea',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'header_description_ar',
            'value' => 'أكثر من 50 عامًا من الخبرة في خدمة محطات الخدمة ومراكز الغسيل حول العالم.',
            'label_en' => 'Header Description (Arabic)',
            'label_ar' => 'وصف الرئيسية بالعربية',
            'type' => 'textarea',
            'group' => 'home',
        ]);


        //Home Page About us
        Setting::create([
            'key' => 'about_description_en',
            'value' => '<p>Manage your company better with us Manage your company better with us Manage Manage your company company.</p>',
            'label_en' => 'About us Description (English)',
            'label_ar' => 'وصف عن الشركة بالإنجليزية',
            'type' => 'editor',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'about_description_ar',
            'value' => '<p>إدارة شركتك بشكل أفضل معنا إدارة شركتك بشكل أفضل معنا إدارة إدارة شركتك.</p>',
            'label_en' => 'About us Description (Arabic)',
            'label_ar' => 'وصف عن الشركة بالعربية',
            'type' => 'editor',
            'group' => 'home',
        ]);


        //Home Page Achievements
        Setting::create([
            'key' => 'achievements_en',
            'value' => '<p>Manage your company better with us Manage your company better with us Manage Manage your company company.</p>',
            'label_en' => 'Our Achievements (English)',
            'label_ar' => 'إنجازاتنا بالإنجليزية',
            'type' => 'editor',
            'group' => 'home',
        ]);
        Setting::create([
            'key' => 'achievements_ar',
            'value' => '<p>إدارة شركتك بشكل أفضل معنا إدارة شركتك بشكل أفضل معنا إدارة إدارة شركتك.</p>',
            'label_en' => 'Our Achievements (Arabic)',
            'label_ar' => 'إنجازاتنا بالعربية',
            'type' => 'editor',
            'group' => 'home',
        ]);


        //General Settings
        Setting::create([
            'key' => 'email',
            'value' => 'quipsolution@gmail.com',
            'label_en' => 'Email Address',
            'label_ar' => 'البريد الإلكتروني',
            'type' => 'text',
            'group' => 'general',
        ]);
        Setting::create([
            'key' => 'phone_number',
            'value' => '+956125476258',
            'label_en' => 'Phone Number',
            'label_ar' => 'رقم الهاتف',
            'type' => 'text',
            'group' => 'general',
        ]);
        Setting::create([
            'key' => 'location_en',
            'value' => 'Test Str, 314 building',
            'label_en' => 'Company Location (English)',
            'label_ar' => 'عنوان الشركة بالإنجليزية',
            'type' => 'text',
            'group' => 'general',
        ]);
        Setting::create([
            'key' => 'location_ar',
            'value' => 'شارع رقم 314 مبنى 50',
            'label_en' => 'Company Location (Arabic)',
            'label_ar' => 'عنوان الشركة بالعربية',
            'type' => 'text',
            'group' => 'general',
        ]);
        

    }
}
