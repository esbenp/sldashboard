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
            'title' => 'GitHub commits',
            'slug' => 'github-commits',
            'icon' => 'github',
            'format' => '{ "commits": { "options": { "label": "Commits:", "type": "text" } }, "repository": { "options":{ "label": "Repository:", "type": "select", "engine": "App\\\Service\\\GitHubService@getFormRepositories"}}}',
            'partial' => 'git.github.commits',
        ]);

        DB::table('types')->insert([
            'id' => Uuid::generate(4),
            'title' => 'Analytics: Users online (Live)',
            'slug' => 'analytics-online',
            'icon' => 'users',
            'format' => '',
            'partial' => 'analytics.online',
        ]);

        $this->command->info('Box types seeded');
    }
}
