<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Question;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(User::class, 5)->create()->each(function ($user) {
			$user->questions()->saveMany(factory(Question::class, 2)->make());
		});

		$murilo = User::create([
			'name' => 'Murilo Eduardo dos Santos',
			'email' => 'muriloeduardoooooo@gmail.com',
			'password' => bcrypt('liloeduardo0202'),
		]);

		$murilo->questions()->saveMany(factory(Question::class, 2)->make());
	}
}
