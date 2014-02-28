<?php
namespace Hidiyo\Thepanel\Seeds;
use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        $this->call('Hidiyo\Thepanel\Seeds\UserTable');
        $this->command->info('All set and done.');
    }

}