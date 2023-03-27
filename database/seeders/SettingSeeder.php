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
        Setting::create([
            'key' => 'developer_name_en',
            'value' => 'Ameer Abunada',
            'label' => 'Developer\'s Name (English)',
            'type' => 'text',
            'group' => 'general',
        ]);
        Setting::create([
            'key' => 'developer_name_ar',
            'value' => 'أمير أبوندى',
            'label' => 'Developer\'s Name (Arabic)',
            'type' => 'text',
            'group' => 'general',
        ]);

    }
}
