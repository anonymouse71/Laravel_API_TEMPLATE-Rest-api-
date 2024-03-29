<?php

use Faker\Factory as Faker;

/**
 *
 */
class LessonsTableSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker::create();

		foreach (range(1,50) as $index) {
			Lesson::create([
				'title' => $faker->sentence(5),
				'body' => $faker->paragraph(4),
				'some_bool' => $faker->boolean()
			]);
		}
	}
}