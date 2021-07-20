<div>
    <x-tabs active="Search Details">
        <x-tab name="Search Details">
            <livewire:search.search-details :search="$search" />
        </x-tab>

        <x-tab name="Search Teams">
            <livewire:search.search-teams :search="$search" />
        </x-tab>

        <x-tab name="Radio Assignments">
            <livewire:search.radio-assignments :search="$search" />
        </x-tab>

        <x-tab name="Comms Log">
            Comms Log
        </x-tab>

        <x-tab name="Search Log">
            Search Log
        </x-tab>
    </x-tabs>
</div>
