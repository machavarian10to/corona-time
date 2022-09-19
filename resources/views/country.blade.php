<x-layout>
    <x-dashboard-template title="{{ __('general.stats_by_country') }}">
        <div class="border-b ml-[20px] md:ml-0 my-[40px]">
            <div class="flex w-[250px] justify-between ">
                <a href="{{ route('dashboard') }}">
                    <p>{{ __('general.worldwide') }}</p>
                </a>
                <p class="font-bold border-b-4 border-b-black h-[40px]">
                    {{ __('general.country') }}
                </p>
            </div>
        </div>

        <form method="GET" >
            <div class="mb-10 relative">
                <div class="flex absolute inset-y-0 left-6 md:left-1
                items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>

                <input
                    type="text"
                    id="search"
                    name="search"
                    class="ml-[20px] md:ml-0 pl-12 w-[240px] h-[48px] rounded-lg border
                    border-gray-300 text-sm focus:border-none"
                    placeholder="{{ __('general.search') }}"
                    value="{{ request('search') }}"
                >
            </div>
        </form>

        <div class="md:overflow-y-scroll h-[600px] mb-16">
            <table class="table-fixed md:table-auto border-collapse w-full">
                <thead class="h-[60px] z-2 sticky">
                    <tr class="bg-table-header font-semibold text-xs md:text-sm">
                        <th class="p-2">
                            <x-table-header
                                name="{{ __('general.location') }}"
                                value="country"
                                sort="{{ 'country' }}"
                            />
                        </th>
                        <th>
                            <x-table-header
                                name="{{ __('general.new_cases') }}"
                                value="confirmed"
                                sort="{{ 'confirmed' }}"
                            />
                        </th>
                        <th>
                            <x-table-header
                                name="{{ __('general.deaths') }}"
                                value="deaths"
                                sort="{{ 'deaths' }}"
                            />
                        </th>
                        <th>
                            <x-table-header
                                name="{{ __('general.recovered') }}"
                                value="recovered"
                                sort="{{ 'recovered' }}"
                            />
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-[1px] text-center h-[50px] rounded-2xl">
                        <td>{{ __('general.worldwide') }}</td>
                        <td>{{ $general->pluck('confirmed')->sum() }}</td>
                        <td>{{ $general->pluck('deaths')->sum() }}</td>
                        <td>{{ $general->pluck('recovered')->sum() }}</td>
                    </tr>
                    @foreach($statistics as $statistic)
                        <tr class="border-[1px] text-center h-[50px] rounded-l ">
                            <td class="rounded-l">{{ $statistic->country }}</td>
                            <td>{{ $statistic->confirmed }}</td>
                            <td>{{ $statistic->deaths }}</td>
                            <td>{{ $statistic->recovered }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-dashboard-template>
</x-layout>
