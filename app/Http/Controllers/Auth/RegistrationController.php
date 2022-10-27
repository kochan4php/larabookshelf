<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
  public function index(): View
  {
    return view('auth.register');
  }

  public function store(RegistrationRequest $request)
  {
    $request->register();
    return redirect()->to(route('login'))->with('success', 'Registrasi Berhasil, Silahkan Login');
  }
}
