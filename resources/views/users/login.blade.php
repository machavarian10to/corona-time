<x-layout>
    <form method="POST" action="{{ route('user.login') }}">
        @csrf
        <x-auth-template>
            <x-title name="{{ __('general.welcome') }}" />

            <x-subtitle name="{{ __('general.enter_details') }}" />

            <x-input type="text" name="username" title="{{ __('general.username') }}"
                     placeholder="{{ __('general.user_placeholder') }}" />

            <x-input type="password" name="password" title="{{ __('general.password') }}"
                     placeholder="{{ __('general.password_placeholder') }}" />

            <div class="flex">
                <x-remember-device />

                <a href="{{ route('forgot.password') }}"
                   class="ml-12 text-custom-indigo font-semibold text-sm"
                >
                    {{ __('general.forget') }}
                </a>
            </div>

            <x-button name="{{ __('general.login') }}" />

            <x-redirect-link name="{{ __('general.dont_have_account') }}"
                             link="{{ route('register') }}"
                             title="{{ __('general.signup_free') }}"
            />

        </x-auth-template>
    </form>
</x-layout>
