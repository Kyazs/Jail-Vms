<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visitors')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'contact_number' => '1234567890',
                'gender_id' => 1,
                'date_of_birth' => '1990-01-01',
                'country' => 'USA',
                'address_street' => '123 Main St',
                'address_city' => 'Anytown',
                'address_province' => 'Anystate',
                'address_barangay' => 'Anybarangay',
                'address_zip' => '12345',
                'id_type' => '1',
                'id_document_path' => 'path/to/document.jpg',
                'is_verified' => true
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'contact_number' => '0987654321',
                'gender_id' => 2,
                'date_of_birth' => '1985-05-15',
                'country' => 'Canada',
                'address_street' => '456 Elm St',
                'address_city' => 'Othertown',
                'address_province' => 'Otherstate',
                'address_barangay' => 'Otherbarangay',
                'address_zip' => '54321',
                'id_type' => '2',
                'id_document_path' => 'path/to/another_document.jpg',
                'is_verified' => false
            ]
        ]);

        DB::table('visitor_credentials')->insert([
            [
                'visitor_id' => 1,
                'username' => 'john.doe',
                'password' => Hash::make('password')
            ],
            [
                'visitor_id' => 2,
                'username' => 'jane.smith',
                'password' => Hash::make('password')
            ]
        ]);
    }
}
