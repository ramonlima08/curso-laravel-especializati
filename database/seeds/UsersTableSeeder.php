<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(User::class, 10)->create();

        /*User::create([
            'name' => 'Ramon Lima',
            'email' => 'ramonlima08@gmail.com',
            'password' => bcrypt('123456')
        ]);*/
    }
}
