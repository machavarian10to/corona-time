<x-layout>
    <form method="POST" action="{{ route('password.request') }}">
        @csrf
        <div class="flex items-center mt-10 flex-col">
            <img src="{{ URL('storage/logo.svg') }}"  />
            <div class="flex flex-col items-center mt-20">
                <x-title name="Reset Password" class="mb-16" />

                <x-input type="email" name="email" title="Email"
                         placeholder="Enter your email"
                />
            </div>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="mt-6 w-[392px] h-[56px] bg-custom-green
                        rounded-lg text-white font-black hover:bg-opacity-90"
            >
                RESET PASSWORD
            </button>
        </div>
    </form>
</x-layout>
