<x-layout>
    <form method="POST" action="{{ route('user.register') }}">
        @csrf
        <x-template>
            <x-title name="Welcome to Coronatime" />

            <x-subtitle name="Please enter required info to sign up" />

            <x-input type="text" name="username" title="Username"
                     placeholder="Enter unique username" />

            <p class="text-sm text-custom-grey mb-3">
                Username should be unique, min 3 symbols
            </p>

            <x-input type="email" name="email" title="Email"
                     placeholder="Enter your email" />

            <x-input type="password" name="password" title="Password"
                     placeholder="Fill in password" />

            <x-input type="password" name="password_confirmation"
                     title="Repeat password" placeholder="Repeat password" />

            <div>
                <x-remember-device />
            </div>

            <x-button name="SIGN UP" />

            <x-redirect-link name="Already have an account?"
                             link="{{ route('login') }}"
                             title="Log in"
            />
        </x-template>
    </form>
</x-layout>
