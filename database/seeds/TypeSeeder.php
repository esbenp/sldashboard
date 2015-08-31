<?php

namespace App\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'id' => Uuid::generate(4),
            'title' => 'GitHub',
            'slug' => 'github',
            'icon' => 'github',
        ]);

        DB::table('types')->insert([
            'id' => Uuid::generate(4),
            'title' => 'Analytics: Users online (Live)',
            'slug' => 'analytics-online',
            'icon' => 'users',
        ]);

        $this->command->info('Box types seeded');
    }
}
