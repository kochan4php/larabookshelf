<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegistrationRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(): bool
  {
    return Auth::guest();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules(): array
  {
    return [
      'nama' => ['required', 'min:2', 'max:255'],
      'username' => ['required', 'min:5', 'max:255', 'unique:users', 'alpha_dash'],
      'email' => ['required', 'min:6', 'max:255', 'unique:users', 'email'],
      'password' => ['required', 'min:6', 'max:255']
    ];
  }

  public function register(): void
  {
    $attr = $this->only(['nama', 'username', 'email', 'password']);
    $attr['password'] = bcrypt($attr['password']);
    User::create($attr);
  }
}
