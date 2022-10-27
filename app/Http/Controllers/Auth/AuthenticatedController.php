<?php

namespace App\Http\Controllers\Auth;

use App\{Http\Controllers\Controller, Http\Requests\Auth\AuthenticationRequest};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
  public function index(): View
  {
    return view('auth.login');
  }

  public function authenticate(AuthenticationRequest $request): Redirector|Application|RedirectResponse
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect(route('buku.index'));
    }

    return redirect()->back()->with('error', 'Credential tidak valid, silahkan coba lagi');
  }
}
