<div>
    <x-tabs active="Search Details">
        <x-tab name="Search Details">
            <livewire:search.search-details :search="$search" />
        </x-tab>

        <x-tab name="Search Teams">
            <livewire:search.teams.list-search-teams :search="$search" />
        </x-tab>

        <x-tab name="Radio Assignments">
            Radio Assignments
        </x-tab>

        <x-tab name="Comms Log">
            Comms Log
        </x-tab>

        <x-tab name="Search Log">
            Search Log
        </x-tab>
    </x-tabs>
</div>
