<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Luis Antonio Parrado',
            'email' => 'luisprmat@gmail.com',
            'password' => '$2y$10$6fasMFl021OwVvDNEwC2Ve8KzkYOYYf6XZIo56c3JD0VxArowsn5C' //lpklprplus
        ]);

        factory(User::class, 11)->create();
    }
}
