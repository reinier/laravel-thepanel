<?php
namespace Hidiyo\Thepanel\Seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTable extends Seeder {
    public function run()
    {
        $users = [
            [
                'username'      => Config::get('thepanel::setup.username'),
                'email'         => Config::get('thepanel::setup.email'),
                'name'          => Config::get('thepanel::setup.name'),
                'password'      => Hash::make(Config::get('thepanel::setup.password')),
                'role'          => 'admin',
                'bio'           => 'No information yet.',
                'publichash'    => str_random(),
                'activated'     => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('users')->delete();
        DB::table('users')->insert($users);
        $this->command->info('User table seeded.');
    }
}
