<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        $settings = [
            [
                'label' => 'Site Logo',
                'type' => 'file',
                'constant' => 'site_logo',
                'options' => '',
                'class' => 'img_class',
                'icon' => 'fa fa-upload',
                'required' => 'n',
                'value' => 'frontend/images/logo.png',
                'hint' => 'Site logo which you want to display',
                'other_info' => null,
                'editable' => 'y',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'label' => 'Email',
                'type' => 'email',
                'constant' => 'support_email',
                'options' => null,
                'class' => 'email_class',
                'icon' => 'fas fa-envelope',
                'required' => 'y',
                'value' => 'support@test.com',
                'hint' => 'Enter Support Email',
                'other_info' => null,
                'editable' => 'y',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'label' => 'Contact Number',
                'type' => 'text',
                'constant' => 'support_contact',
                'options' => null,
                'class' => 'phone_class',
                'icon' => 'fas fa-phone-alt',
                'required' => 'y',
                'value' => '1234567890',
                'hint' => 'Enter Support Contact',
                'other_info' => null,
                'editable' => 'y',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'label' => 'Copy Right',
                'type' => 'text',
                'constant' => 'footer_text',
                'options' => null,
                'class' => null,
                'icon' => 'fas fa-copyright',
                'required' => 'y',
                'value' => '© {{YEAR}} ' . env('APP_NAME') . '. All Rights Reserved',
                'hint' => 'Enter Copayright',
                'other_info' => null,
                'editable' => 'y',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'label' => 'Facebook',
                'type' => 'text',
                'constant' => 'facebook',
                'options' => null,
                'class' => null,
                'icon' => 'fab fa-facebook-f',
                'required' => 'n',
                'value' => 'https://www.facebook.com',
                'hint' => 'Enter Facebook Page Link',
                'other_info' => null,
                'editable' => 'y',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'label' => 'Twitter',
                'type' => 'text',
                'constant' => 'twitter',
                'options' => null,
                'class' => null,
                'icon' => 'fab fa-twitter',
                'required' => 'n',
                'value' => 'https://www.twitter.com',
                'hint' => 'Enter Twitter Page Link',
                'other_info' => null,
                'editable' => 'y',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'label' => 'Instagram',
                'type' => 'text',
                'constant' => 'instagram',
                'options' => null,
                'class' => null,
                'icon' => 'fab fa-instagram',
                'required' => 'n',
                'value' => 'https://www.instagram.com',
                'hint' => 'Enter Instagram Page Link',
                'other_info' => null,
                'editable' => 'y',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'label' => 'Youtube',
                'type' => 'text',
                'constant' => 'yotube',
                'options' => null,
                'class' => null,
                'icon' => 'fab fa-youtube',
                'required' => 'n',
                'value' => 'https://www.youtube.com/',
                'hint' => 'Enter Youtube Page Link',
                'other_info' => null,
                'editable' => 'y',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
           
           
        ];

        $db = DB::table('settings')->insert($settings);
    }
}
