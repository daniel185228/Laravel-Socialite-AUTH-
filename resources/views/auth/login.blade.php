<style>
        .social-link{
                margin-right: 10px;
        }
</style>

<x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
    
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
    
                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

                
            <div class="flex items-center mt-4">
                {{-- Login with Google --}}
                <a href="{{route('auth.redirection', 'google')}}" title="Login with Google" class="social-link inline-block px-3 py-2  text-white  rounded-lg shadow">
                <img src="/img/google.png" alt="" style="width: 20px" /></a>
               
                {{-- Login with Facebook --}}
                <a href="{{route('auth.redirection', 'facebook')}}" title="Login with Facebook" class="social-link inline-block px-3 py-2  text-white  rounded-lg shadow">
                <img src="/img/facebook.png" alt="" style="width: 20px" /></a>

                {{-- Login with Github --}}
                <a href="{{route('auth.redirection', 'github')}}" title="Login with Github" class="social-link inline-block px-3 py-2  text-white  rounded-lg shadow">
                <img src="/img/github.png" alt="" style="width: 25px" /></a>

                {{-- Login with Linkedin --}}
                <a href="{{route('auth.redirection', 'linkedin-openid')}}" title="Login with Linkedin" class="social-link inline-block px-3 py-2  text-white  rounded-lg shadow">
                <img src="/img/linkedin.png" alt="" style="width: 30px" /></a>

                {{-- Login with X --}}
                <a href="{{route('auth.redirection', 'x')}}" title="Login with X" class="social-link inline-block px-3 py-2  text-white  rounded-lg shadow">
                <img src="/img/X(Twitter).jpeg" alt="" style="width: 25px" /></a>
            </div>


        </form>
    </x-guest-layout>
    