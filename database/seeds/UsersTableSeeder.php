<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\User::class, 5)->create()->each(function ($user) {
			$user->questions()->save(factory(App\Question::class)->make());
		});

		DB::table('users')->insert([
			'name' => 'Murilo Eduardo dos Santos',
			'slug' => 'murilo-eduardo-dos-santos',
			'email' => 'muriloeduardoooooo@gmail.com',
			'password' => bcrypt('liloeduardo0202'),
		]);
	}
}
