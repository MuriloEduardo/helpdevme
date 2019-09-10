<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Talk;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class TalkController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:api');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$talks = Talk::where('user_id', auth()->id())
			->orWhere('receiver_id', auth()->id())
			->with(['user', 'receiver', 'question', 'posts'])
			->get();

		return response(['talks' => $talks]);
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$talk = Talk::findOrFail($id);

		$talk->posts()->whereNull('read_at')->update(['read_at' => Carbon::now()]);

		$talk->load('posts', 'user', 'receiver', 'question');

		return response()->json(compact('talk'));
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
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

	/**
	 * Display the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function markAllAsRead()
	{
		$talks = Talk::where('receiver_id', auth()->id())->get();

		foreach ($talks as $talk) {
			$talk->posts()->whereNull('read_at')->update(['read_at' => Carbon::now()]);

			$talk->load('posts', 'user', 'receiver', 'question');
		}

		return response()->json(compact('talks'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function uploadImages(Request $request)
	{
		$path = $request->file('image')->storePublicly('questions');

		return response(['path' => Storage::url($path)]);
	}
}
