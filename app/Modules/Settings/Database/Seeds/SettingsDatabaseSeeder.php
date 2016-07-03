<?php

namespace App\Modules\Settings\Database\Seeds;

use Nova\Database\Seeder;
use Nova\Database\ORM\Model;


class SettingsDatabaseSeeder extends Seeder
{
    /**
     * Run the Database Seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('App\Modules\Settings\Database\Seeds\FoobarTableSeeder');
    }
}
