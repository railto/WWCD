<div>
    <form action="#" method="POST" class="space-y-6" wire:submit.prevent="storeSearch">
        @foreach($errors->all() as $error)
            {{$error}} <br/>
        @endforeach
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">
                Location
            </label>
            <div class="mt-1">
                <input wire:model.defer="location" type="text" id="location"
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>

        <div>
            <label for="start" class="block text-sm font-medium text-gray-700">
                Start Date / Time
            </label>
            <input type="datetime-local" wire:model.defer="start" id="start" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        </div>

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">
                Search Type
            </label>
            <select wire:model.defer="type" id="type"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option disabled value="default">Select Search Type</option>
                <option value="exercise">Exercise</option>
                <option value="incident">Incident</option>
            </select>
        </div>

        <div>
            <label for="oic" class="block text-sm font-medium text-gray-700">
                Officer In Charge
            </label>
            <select wire:model.defer="officer_in_charge" id="oic"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option disabled value="default">Select Officer In Charge</option>
                @foreach ($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

            <div>
                <label for="sm" class="block text-sm font-medium text-gray-700">
                    Search Manager
                </label>
                <select wire:model.defer="search_manager" id="sm"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled value="default">Select Search Manager</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="so" class="block text-sm font-medium text-gray-700">
                    Safety Officer
                </label>
                <select wire:model.defer="safety_officer" id="so"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled value="default">Select Safety Officer</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="sl" class="block text-sm font-medium text-gray-700">
                    Section Leader
                </label>
                <select wire:model.defer="section_leader" id="sl"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled value="default">Select Section Leader</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="ro" class="block text-sm font-medium text-gray-700">
                    Radio Operator
                </label>
                <select wire:model.defer="radio_operator" id="ro"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled value="default">Select Radio Operator</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="scribe" class="block text-sm font-medium text-gray-700">
                    Scribe
                </label>
                <select wire:model.defer="scribe" id="scribe"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled value="default">Select Scribe</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="h-10 px-4 text-center text-white bg-indigo-400 font-semibold rounded-lg">Create Search Record</button>
    </form>
</div>
