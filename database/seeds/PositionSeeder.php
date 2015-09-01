<?php

namespace App\Seeds;

use App\Models\Box\Position;
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
        // Add transaction to secure against faulty errors
        DB::beginTransaction();

        // Reset table
        DB::table('positions')->truncate();

        $names = ['left', 'center', 'right'];
        // We use models to avoid null constraint violations
        // in the timestamp columns
        foreach($names as $name) {
            $position = new Position;
            $position->id = Uuid::generate(4);
            $position->name = $name;
            $position->save();
        }

        DB::commit();

        $this->command->info('Box positions seeded');
    }
}
