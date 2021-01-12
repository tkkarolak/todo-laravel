<x-guest-layout>
    <x-slot name="title">
        @lang('general.Registering')
    </x-slot>
    <x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">@lang('auth.name-label')</label>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email">Email</label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">@lang('auth.password-label')</label>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">@lang('auth.confirm password-label')</label>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="d-flex align-items-start flex-column">
                <x-button class="my-4">
                    @lang('general.Register')
                    {{-- {{ __('Register') }} --}}
                </x-button>

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    @lang('auth.already registered')
                    {{-- {{ __('Already registered?') }} --}}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
