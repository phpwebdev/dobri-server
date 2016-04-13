<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



$factory->define(App\Server::class, function (Faker\Generator $faker) {
    return [
        'server_name'=>$faker->sentence(3, true), 
        'server_ip'=>$faker->ipv4,
        'server_port'=>$faker->numberBetween(1,65535),
        'nvenc_h264'=>$faker->boolean(),
        'nvenc_hevc'=>$faker->boolean(),
        'x264'=>$faker->boolean(),
        'x265'=>$faker->boolean(),
        'enabled'=>$faker->boolean(),
    ];
});


$factory->define(App\Channel::class, function (Faker\Generator $faker) {
    return [
        'channel_name' => $faker->sentence(2, true),
        'server_id'=>App\Server::all()->random()->id,
        'source' => $faker->text(200),
        'audio_output' => $faker->numberBetween(0,255),
        'nvenc_h264' => $faker->boolean(),
        "x264" => $faker->boolean(),
        "hd"=> $faker->boolean(),
        "rtmp_name" => $faker->sentence(3, true),
        "enabled" => $faker->boolean()
    ];
});


 
