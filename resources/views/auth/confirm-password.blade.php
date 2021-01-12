<x-guest-layout>
    <x-slot name="title">
        @lang('general.confirm password')
    </x-slot>
    <x-auth-card>

        <div class="mb-4 text-sm text-gray-600">
            @lang('auth.confirm pass message')
            {{-- {{ __('This is a secure area of the application. Please confirm your password before continuing.') }} --}}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <label for="password">@lang('auth.password')</label>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    @lang('general.Confirm')
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
