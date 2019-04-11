<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Mahasiswa::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'jurusan'=>$faker->jobTitle,
        'alamat'=>$faker->address,
        // 'agama'=>$faker->numberBetween(1,9),
        // 'toefl'=>$faker->numberBetween(1,9),
        // 'ipk'=>$faker->numberBetween(1,9),
        // 'masak'=>$faker->numberBetween(1,9),
        // 'kecantikan'=>$faker->numberBetween(1,9),
    ];
});
