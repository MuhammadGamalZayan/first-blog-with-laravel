<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::where('email', 'dahab@gmail.com')->first();
        $user = DB::table('users')->where('email', 'muhammad@gmail.com')->first();

        if (! $user) {
            User::create([
                'name' => 'muhammad',
                'email' => 'muhammad@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ]);
        }
    }

}
