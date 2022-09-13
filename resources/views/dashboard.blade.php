<x-layout>
    <x-dashboard-template title="Worldwide Statistics">
        <div class="border-b my-[50px]">
            <div class="flex w-[250px] justify-between ">
                <p class="font-bold border-b-4 border-b-black h-[40px]">Worldwide</p>
                <a href="{{ route('country') }}"><p>By country</p></a>
            </div>
        </div>

        <div class="flex justify-between">
            <x-statistic-card
                bg="{{ URL('storage/indigo-block.png') }}"
                stat_img="{{ URL('storage/new.png') }}"
                title="New cases" amount="{{ $statistic->pluck('confirmed')->sum() }}" color="text-custom-indigo"
            />

            <x-statistic-card
                bg="{{ URL('storage/green-block.png') }}"
                stat_img="{{ URL('storage/recovered.png') }}"
                title="Recovered" amount="{{ $statistic->pluck('recovered')->sum() }}" color="text-custom-green"
            />

            <x-statistic-card
                bg="{{ URL('storage/yellow-block.png') }}"
                stat_img="{{ URL('storage/death.png') }}"
                title="Death" amount="{{ $statistic->pluck('deaths')->sum() }}" color="text-custom-yellow"
            />
        </div>
    </x-dashboard-template>
</x-layout>
