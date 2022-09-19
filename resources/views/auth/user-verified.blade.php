<x-layout>
    <x-confirmation name="{{__('general.confirmed_account')}}">
        <img src="{{ URL('/images/checked.png') }}"  />
    </x-confirmation>

    <div class="text-center mt-6">
        <a href="{{ route('login') }}">
            <button class="mt-6 w-[343px] md:w-[392px] h-[56px] bg-custom-green
                    rounded-lg text-white font-black hover:bg-opacity-90"
            >
                {{__('general.signin') }}
            </button>
        </a>
    </div>
</x-layout>
