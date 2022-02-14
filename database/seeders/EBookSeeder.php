<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ebooks')->insert([
            'title' => 'Title E-Book 1',
            'author' => 'Author E-Book 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis, erat ut sagittis lobortis, magna arcu convallis risus, ac efficitur massa ligula eu mi. Phasellus vestibulum neque et nisi feugiat imperdiet. Vivamus varius nisl ac.'
        ]);

        DB::table('ebooks')->insert([
            'title' => 'Title E-Book 2',
            'author' => 'Author E-Book 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed convallis, erat ut sagittis lobortis, magna arcu convallis risus, ac efficitur massa ligula eu mi. Phasellus vestibulum neque et nisi feugiat imperdiet. Vivamus varius nisl ac.'
        ]);
    }
}
