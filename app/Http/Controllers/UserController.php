<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JD\Cloudder\Facades\Cloudder;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::withCount(['tags', 'questions', 'talks'])
			->orderBy('questions_count', 'desc')
			->orderBy('talks_count', 'desc')
			->orderBy('tags_count', 'desc')
			->get();

		return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		if ($request->has('avatar')) {
			$this->validate($request, [
				'avatar' => 'mimes:jpeg,bmp,jpg,png|between:1, 6000',
			]);

			$image_name = $request->file('avatar')->getRealPath();

			Cloudder::upload($image_name, null);

			$resultUpload = Cloudder::getResult();

			$user->avatar = $resultUpload['secure_url'];
		}

		if ($request->has('password')) {
			if (!Hash::check($request->current_password, $user->password)) {

				return back()->withErrors('Senha errada!');
			} else {

				Validator::make($request->all(), [
					'password' => 'required|confirmed',
				])->validate();

				$request->merge([
					'password' => Hash::make($request->password)
				]);
			}
		}

		$user->update($request->all());

		$user->tags()->sync($request->tags);

		return back()->with('success', 'Perfil Editado!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
