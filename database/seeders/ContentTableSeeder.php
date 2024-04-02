<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Content::create([
            'title' => 'نص للاختبار',
            'desc' => 'نص للاختبار',
            'photo' => 'test.jpg'
        ]);
    }
}
