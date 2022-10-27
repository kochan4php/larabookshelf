<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
  public function index(): View
  {
    return view('auth.login');
  }

  public function authenticate(AuthenticationRequest $request)
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect(route('buku.index'));
    }

    return redirect()->back()->with('error', 'Credential tidak valid, silahkan coba lagi');
  }
}
