<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Evenement;
use App\Models\Hotesse;
use App\Models\Invite;
use App\Models\Prestataire;
use App\Models\Table;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
        //Customer::factory(10)->create();
        //Evenement::factory(30)->create();
        Table::factory(300)->create();
        Invite::factory(1500)->create();
        Prestataire::factory(5)->create();
        Hotesse::factory(20)->create();


       /*  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
