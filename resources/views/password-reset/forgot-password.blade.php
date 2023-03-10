<x-layout>
    <form method="POST" action="{{ route('password.request') }}">
        @csrf
        <div class="flex items-center mt-10 flex-col">
            <img src="{{ URL('/images/logo.svg') }}"  />
            <div class="flex flex-col items-center mt-16">
                <x-title name="{{ __('general.reset_password') }}" class="mb-16" />

                <x-input type="email" name="email" title="{{ __('general.email') }}"
                         placeholder="{{ __('general.email_placeholder') }}"
                />
            </div>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="mt-6 w-[343px] md:w-[392px] h-[56px] bg-custom-green
                        rounded-lg text-white font-black hover:bg-opacity-90"
            >
                {{ __('general.reset') }}
            </button>
        </div>
    </form>
</x-layout>
