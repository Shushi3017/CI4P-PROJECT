<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $password = password_hash('Password123!', PASSWORD_DEFAULT);

        // manually define users
        $users = [
            [
                'username'   => 'admin1',
                'firstname'  => 'Alice',
                'lastname'   => 'Smith',
                'age'        => 35,
                'email'      => 'alice.smith@example.com',
                'password'   => $password,
                'type'       => 'admin',
                'status'     => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username'   => 'admin2',
                'firstname'  => 'Bob',
                'lastname'   => 'Johnson',
                'age'        => 40,
                'email'      => 'bob.johnson@example.com',
                'password'   => $password,
                'type'       => 'admin',
                'status'     => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username'   => 'user1',
                'firstname'  => 'Charlie',
                'lastname'   => 'Brown',
                'age'        => 28,
                'email'      => 'charlie.brown@example.com',
                'password'   => $password,
                'type'       => 'user',
                'status'     => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username'   => 'user2',
                'firstname'  => 'Dana',
                'lastname'   => 'Taylor',
                'age'        => 22,
                'email'      => 'dana.taylor@example.com',
                'password'   => $password,
                'type'       => 'user',
                'status'     => 'suspended',
                'created_at' => $now,
                'updated_at' => $now,
            ]
            // add more manually as needed
        ];

        $this->db->table('users')->insertBatch($users);
    }
}
