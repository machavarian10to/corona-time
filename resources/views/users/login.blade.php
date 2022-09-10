<x-layout>
    <form method="POST" action="{{ route('user.login') }}">

        @csrf
        <x-auth-template>
            <x-title name="Welcome back" />

            <x-subtitle name="Welcome back! Please enter your details" />

            <x-input type="text" name="username" title="Username"
                     placeholder="Enter unique username or email" />

            <x-input type="password" name="password" title="Password"
                     placeholder="Fill in password" />

            <div>
                <x-remember-device />

                <a href="{{ route('forgot.password') }}"
                   class="ml-20 text-custom-indigo font-semibold text-sm"
                >
                    Forget password?
                </a>
            </div>

            <x-button name="LOG IN" />

            <x-redirect-link name="Don’t have and account?"
                             link="{{ route('register') }}"
                             title="Sign up for free"
            />
        </x-auth-template>
    </form>
</x-layout>
