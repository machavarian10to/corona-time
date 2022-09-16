<x-layout>
    <form method="POST" action="{{ route('user.register') }}">
        @csrf
        <x-auth-template>
            <x-title name="{{ __('general.welcome_register') }}" />

            <x-subtitle name="{{ __('general.enter_info') }}" />

            <x-input type="text" name="username" title="{{ __('general.username') }}"
                     placeholder="{{ __('general.username_placeholder') }}" />

            <p class="text-sm text-custom-grey mb-3">
                {{ __('general.user_symbols') }}
            </p>

            <x-input type="email" name="email" title="{{ __('general.email') }}"
                     placeholder="{{ __('general.email_placeholder') }}" />

            <x-input type="password" name="password" title="{{ __('general.password') }}"
                     placeholder="{{ __('general.password_placeholder') }}" />

            <x-input type="password" name="password_confirmation"
                     title="{{ __('general.repeat_password') }}" placeholder="{{ __('general.repeat_password') }}" />

            <div>
                <x-remember-device />
            </div>

            <x-button name="{{ __('general.signup') }}" />

            <x-redirect-link name="{{ __('general.have_an_account') }}"
                             link="{{ route('login') }}"
                             title="{{ __('general.login_lower') }}"
            />
        </x-auth-template>
    </form>
</x-layout>
