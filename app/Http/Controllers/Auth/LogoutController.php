<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
  public function logout(Request $request): Redirector|Application|RedirectResponse
  {
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    Auth::logout();
    return redirect(route('login'));
  }
}
