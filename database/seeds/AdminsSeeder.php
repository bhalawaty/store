<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'name' => 'bilal',
            'email' => 'bilal@admin.com',
            'password' => bcrypt('halawaty')
        ]);
    }
}
