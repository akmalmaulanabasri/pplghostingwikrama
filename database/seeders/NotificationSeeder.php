<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::whereEmail('akmal@gmail.com')->first()->id ?? 1;
        Notification::create([
            'title' => 'Selamat Datang',
            'content' => 'Terimakasih sudah menggunakan PPLG HOSTING, silahkan gunakan dengan baik, Terimakasih. ~akmal',
            'user_id' => $userId,
            'is_read' => false,
            'notification_type' => 'Welcome',
        ]);
    }
}