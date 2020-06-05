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
        $this->truncateTables([
            'users'
        ]);

        $this->call([
            UserSeeder::class
        ]);
    }

    protected function truncateTables(array $tables)
    {
        // Disable checking of foreing keys
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        // Activate checking of foreing keys
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
