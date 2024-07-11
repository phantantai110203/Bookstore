<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'taiphan',
                'email' => 'ptai0866@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0344312253',
                'address' => 'Bến Tre',
                'role' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()

            ],
            [
                'name' => 'quangnam',
                'email' => 'quangnam@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0344312254',
                'address' => 'Tiền Giang',
                'role' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()

            ],
            [
                'name' => 'quocviet',
                'email' => 'quocviet@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0344312255',
                'address' => 'TP HCM',
                'role' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CategorySeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            CartSeeder::class,
         ]);
    }

}
