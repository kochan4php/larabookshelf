<x-guest-layout title="Login">
  @if (session()->has('success') || session()->has('error'))
    <div class="row justify-content-center mt-5 w-100">
      <div class="col-md-6">
        @if (session()->has('success'))
          <x-alert message="{{ session('success') }}" />
        @elseif (session()->has('error'))
          <x-alert message="{{ session('error') }}" type="danger" />
        @endif
      </div>
    </div>
  @endif

  <div class="row justify-content-center w-100 @if (session()->has('success') || session()->has('error') ? '' : 'mt-5')  @endif">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Login</h2>
        </div>
        <div class="card-body">
          <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <div class="mb-3">
              <x-input name="email" type="email" label="Email Address" placeholder="example@gmail.com" />
            </div>
            <div class="mb-3">
              <x-input name="password" type="password" label="Password" placeholder="********" />
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember" value="true">
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <x-button type="submit" full-width="true" title="Login Now" />
          </form>
        </div>
        <div class="card-footer text-center">
          <span class="mt-1 mb-3 text-center">
            Not register yet?
            <a href="{{ route('register.index') }}">Register Now!</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
