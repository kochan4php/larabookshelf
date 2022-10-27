<x-guest-layout title="Register">
  <div class="row justify-content-center mt-5 w-100">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Register</h2>
        </div>
        <div class="card-body">
          <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <x-input label="Your Name" placeholder="John Doe" />
            </div>
            <div class="mb-3">
              <x-input name="username" label="Username" placeholder="john_doe" />
            </div>
            <div class="mb-3">
              <x-input name="email" type="email" label="Email Address" placeholder="example@gmail.com" />
            </div>
            <div class="mb-3">
              <x-input name="password" type="password" label="Password" placeholder="********" />
            </div>
            <x-button type="submit" full-width="true" title="Register" />
          </form>
        </div>
        <div class="card-footer text-center">
          <span class="mt-1 mb-3 text-center">
            Already register?
            <a href="{{ route('login') }}">Login Now!</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
