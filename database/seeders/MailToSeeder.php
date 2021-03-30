<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailToSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_tos')->insert([
            'mail_id' => 1,
            'to' => 1,
        ]);
        DB::table('mail_tos')->insert([
            'mail_id' => 1,
            'to' => 2,
        ]);
        DB::table('mail_tos')->insert([
            'mail_id' => 2,
            'to' => 1,
        ]);
        DB::table('mail_tos')->insert([
            'mail_id' => 3,
            'to' => 2,
        ]);
    }
}
