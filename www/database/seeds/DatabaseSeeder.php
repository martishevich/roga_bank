<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('MoneySeeder');
    }
}
class MoneySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->delete();

        DB::table('currencies')->insert([
            'iso' => 'USD',
            'currency_icon' => '$',
            'ratio' => '2.13',
        ]);

        DB::table('currencies')->insert([
            'iso' => 'EUR',
            'currency_icon' => '€',
            'ratio' => '2.42',
        ]);

        DB::table('currencies')->insert([
            'iso' => 'GBP',
            'currency_icon' => '£',
            'ratio' => '2.73',
        ]);
        DB::table('currencies')->insert([
            'iso' => 'BYN',
            'currency_icon' => 'Br',
            'ratio' => '1',
        ]);

    }
}