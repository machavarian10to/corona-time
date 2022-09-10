<x-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="flex items-center mt-12 flex-col">
            <img src="{{ URL('storage/logo.svg') }}"  />

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mt-40">
                <x-input type="email" name="email" title="Email"
                         placeholder="Enter your email" />

                <x-input type="password" name="password" title="New Password"
                         placeholder="Enter new password" />

                <x-input type="password" name="password_confirmation"
                         title="Repeat password" placeholder="Repeat password" />
            </div>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="mt-6 w-[392px] h-[56px] bg-custom-green
                    rounded-lg text-white font-black hover:bg-opacity-90"
            >
                SAVE CHANGES
            </button>
        </div>
    </form>
</x-layout>

