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
        $this->call('StatusCardSeeder');
        $this->call('StatusUserSeeder');
    }
}

class StatusCardSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_cards')->delete();

        DB::table('status_cards')->insert([
            'name_status' => 'is_made',
            'status_description' => 'an order for making a card has been sent',
        ]);

        DB::table('status_cards')->insert([
            'name_status' => 'ready',
            'status_description' => 'the card is made and ready to be sent',
        ]);

        DB::table('status_cards')->insert([
            'name_status' => 'sent_to',
            'status_description' => 'The card has been sent to the user at the specified address.',
        ]);
        DB::table('status_cards')->insert([
            'name_status' => 'received',
            'status_description' => 'user received a card',
        ]);
        DB::table('status_cards')->insert([
            'name_status' => 'in_place',
            'status_description' => 'the card is made and is in the specified branch of the bank',
        ]);
        DB::table('status_cards')->insert([
            'name_status' => 'renouncement',
            'status_description' => 'the recipient refused to receive the card',
        ]);
        DB::table('status_cards')->insert([
            'name_status' => 'blocked_by',
            'status_description' => 'the card has been blocked by the bank',
        ]);
        DB::table('status_cards')->insert([
            'name_status' => 'annulled',
            'status_description' => 'time has expired',
        ]);

    }
}

class StatusUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_users')->delete();

        DB::table('status_users')->insert([
            'name_status_user' => 'registered',
            'status_description_user' => 'user successfully logged in',
        ]);

        DB::table('status_users')->insert([
            'name_status_user' => 'treatment',
            'status_description_user' => 'user data is being processed',
        ]);

        DB::table('status_users')->insert([
            'name_status_user' => 'denial of registration',
            'status_description_user' => 'user denied registration',
        ]);
        DB::table('status_users')->insert([
            'name_status_user' => 'deleted',
            'status_description_user' => 'user deleted',
        ]);
        DB::table('status_users')->insert([
            'name_status_user' => 'blocked by',
            'status_description_user' => 'the user is blocked due to the well-known bank',
        ]);

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