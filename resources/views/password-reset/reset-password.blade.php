<x-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="flex items-center mt-8 flex-col">
            <img src="{{ URL('/images/logo.svg') }}"  />

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mt-20">
                <x-input type="email" name="email" title="{{ __('general.email') }}"
                         placeholder="{{ __('general.email_placeholder') }}" />

                <x-input type="password" name="password" title="{{ __('general.new_password') }}"
                         placeholder="{{ __('general.new_password_placeholder') }}" />

                <x-input type="password" name="password_confirmation"
                         title="{{ __('general.repeat_password') }}" placeholder="{{ __('general.repeat_password') }}" />
            </div>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="mt-4 w-[343px] md:w-[392px] h-[56px] bg-custom-green
                    rounded-lg text-white font-black hover:bg-opacity-90"
            >
                {{ __('general.save_changes') }}
            </button>
        </div>
    </form>
</x-layout>

