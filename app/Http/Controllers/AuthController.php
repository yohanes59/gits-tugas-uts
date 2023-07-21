<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function register()
	{
		$user = User::get();

		return view('auth/register', ['users' => $user]);
	}

	public function doRegister(AuthRequest $request)
	{
		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'role' => 'kasir'
		]);

		return redirect('/admin/cashier-account')->with('alert', 'Berhasil membuat akun kasir');
	}

	public function login()
	{
		return view('auth/login');
	}

	public function doLogin(Request $request)
	{
		Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required'
		])->validate();

		if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
			throw ValidationException::withMessages([
				'email' => trans('auth.failed')
			]);
		}

		$request->session()->regenerate();

		if (Auth::user()->name == 'admin') {
			return redirect('/admin/dashboard');
		} else {
			return redirect('/cashier/order');
		}
	}

	public function logout(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		return redirect('/');
	}

	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('profile.index', ['users' => $user]);
	}

	public function update(Request $request, $id)
	{
		$user = [
			'name' => $request->name,
			'email' => $request->email,
		];

		if ($request->password !== null) {
			$user['password'] = Hash::make($request->password);
		}

		User::find($id)->update($user);

		return redirect('/profile/' . $id)->with('alert', 'Berhasil mengubah akun');
	}
}
