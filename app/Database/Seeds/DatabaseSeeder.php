<?php

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Database\ORM\Model::unguard();

        // $this->call('UserTableSeeder');
    }

}
