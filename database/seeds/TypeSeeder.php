<?php

namespace App\Seeds;

use App\Models\Box\Type;
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
        // Begin transaction to protect against faulty inserts
        DB::beginTransaction();

        // Reset table
        DB::table('types')->truncate();

        $type = new Type;
        $type->fill([
            'title' => 'GitHub commits',
            'slug' => 'github-commits',
            'icon' => 'github',
            'format' => '{ "commits": { "options": { "label": "Commits:", "type": "text" } }, "repository": { "options":{ "label": "Repository:", "type": "select", "engine": "App\\\Service\\\GitHubService@getFormRepositories"}}}',
            'partial' => 'git.github.commits',
        ]);
        $type->save();

        $type = new Type;
        $type->fill([
            'title' => 'Server status',
            'slug' => 'server-status',
            'icon' => 'server',
            'format' => '{"url":{"options":{"label":"Url:","type":"text"}}}',
            'partial' => 'server.status',
        ]);
        $type->save();

        DB::commit();

        $this->command->info('Box types seeded');
    }
}
