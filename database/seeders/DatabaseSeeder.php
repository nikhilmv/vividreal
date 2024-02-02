<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountryStateCityTableSeeder::class);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->assignRole($admin);
        
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole($user);
    }
}
