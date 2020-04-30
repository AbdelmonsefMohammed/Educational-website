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
        'track_id' => Track::all()->random()->id,

    ];
});

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'link'  =>  $faker->url,
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

$factory->define(Photo::class, function (Faker $faker) {

    $userid = User::all()->random()->id;
    $courseid = Course::all()->random()->id;
    
    $photoable_id = $faker->randomElement([$userid , $courseid]);
    $photoable_type = $photoable_id == $userid ? 'App\User' : 'App\Course';


    return [
        'filename' => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg',
        '7.jpg','8.jpg','9.jpg','10.jpg']),
        'photoable_id' => $photoable_id,
        'photoable_type' => $photoable_type,
    ];
});

