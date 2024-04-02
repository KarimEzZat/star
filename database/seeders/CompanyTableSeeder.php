<?php

namespace Database\Seeders;

use App\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Company::create([
            'name' => 'شركة فوم النجوم',
            'description' => 'افضل شركة عزل فوم بالرياض',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'phone' => '966549362523',
            'photo' => 'عن الشركة'
        ]);
    }
}
