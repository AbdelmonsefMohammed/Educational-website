<?php

use App\User;
use App\Course;
use App\Photo;
use App\Question;
use App\Quiz;
use App\Track;
use App\Video;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$WVu/aWH71P7c.IBjd.HcBuNnew7nPHn8Z32tR9cgiaXgePugkum5S', // secret
        'remember_token' => Str::random(10),
        'role' => $faker->randomElement([0,1]),
        'photo' => $faker->randomElement(['photo1.jpg','photo2.jpg','photo3.jpg']),
        'score' => $faker->randomElement([54,90,200,40,155,190]),
    ];
});



$factory->define(Track::class, function (Faker $faker) {
    return [
        'name' => $faker->word,

    ];
});

$factory->define(Course::class, function (Faker $faker) {
    $title = $faker->sentence;
    
    return [
        'title' => $title,
        'slug' => strtolower(str_replace(' ','-',$title)),
        'description' => $faker->paragraph,
        'status' => $faker->randomElement([0,1]),
        'link'  =>  $faker->url,
        'image' => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg',
        '7.jpg','8.jpg','9.jpg','10.jpg']),
        'track_id' => Track::all()->random()->id,

    ];
});

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'link'  =>  $faker->randomElement(['https://www.youtube.com/watch?v=iWOYAxlnaww','https://www.youtube.com/watch?v=ULssP63AhPw','https://www.youtube.com/watch?v=-1h8HQ6rd5U','https://www.youtube.com/watch?v=v0QTqHXiVNw&t=975s','https://www.youtube.com/watch?v=ZYV6dYtz4HA','https://www.youtube.com/watch?v=iWOYAxlnaww']),
        'course_id' => Course::all()->random()->id,

    ];
});

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'course_id' => Course::all()->random()->id,

    ];
});

$factory->define(Question::class, function (Faker $faker) {

    $answers= $faker->paragraph;
    $right_answer = $faker->randomElement(explode('.',rtrim($answers , '.')));
    return [
        'title' => $faker->sentence,
        'answers' => $answers,
        'right_answer' => $right_answer,
        'score' => $faker->randomElement([1,5,10,15,20]),
        'type' => $faker->randomElement(['text','checkbox']),
        'quiz_id' => Quiz::all()->random()->id,

    ];
});

