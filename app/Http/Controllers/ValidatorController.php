<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\User;
use Hash;

use Validator;

class ValidatorController extends Controller
{
	public function getValidator () 
	{
		return view('validator.index');
	}

	public function postValidator (CreateUserRequest $request)
	{
		$user = User::create([
			'username'			=> $request->input('name'),
			'email'				=> $request->input('email'),
			'password'			=> Hash::make($request->input('password')),
			'level'				=> 3,
			'remember_token'	=> $request->input('_token')
		]);

		return redirect()->back();
	}


	public function getValidatorController ()
	{
		return view('validator.controller');
	}

	public function postValidatorController (Request $request)
	{
		$this->validate($request, 
		[
			'username'			=>	'required|min:10|unique:users,username',
			'email'				=>	'required|email|unique:users,email',
			'password'			=> 	'required'
		],
		[
			'username.required' => 'username không được để trống',
			'username.min'		=> 'username tối tiểu 10 ký tự',
			'email.required'	=> 'email không được để trống',
			'email.email'		=> 'email không đúng định dạng',
			'password.required'	=>	'password không được để trống'
		]	
	);
		return redirect()->back();

	}


	public function getValidatorModel ()
	{
		return view('validator.model');
	}

	public function postValidatorModel (Request $request)
	{
		$user = new User;
		$validator = Validator::make(
			$request->all(), 
			$user->rules,
			$user->messages
		);
		if ($validator->fails()) {
			return view('validator.model')->withErrors($validator);
		}
		dd($request->all());
	}


	
}
