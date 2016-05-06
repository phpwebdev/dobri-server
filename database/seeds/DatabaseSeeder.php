<?php

use App\Channel;
use App\Server;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks = 0;');
        Server::truncate();
        Channel::truncate();
        $this->call(ServersTableSeeder::class);
        $this->call(ChannelsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET foreign_key_checks = 1;');
    }
}
