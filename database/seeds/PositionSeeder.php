<?php

namespace App\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'id' => Uuid::generate(4),
            'name' => 'left',
        ]);

        DB::table('positions')->insert([
            'id' => Uuid::generate(4),
            'name' => 'right',
        ]);

        $this->command->info('Box positions seeded');
    }
}
