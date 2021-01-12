<x-guest-layout>
    <x-slot name="title">
        @lang('general.Forgot password')
    </x-slot>
    <x-auth-card>

        <div class="mb-4 text-sm text-gray-600">
            @lang('auth.forgotten pass message')
            {{-- {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }} --}}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    @lang('general.Password Reset')
                    {{-- {{ __('Email Password Reset Link') }} --}}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
