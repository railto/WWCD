<div>
    @if (in_array(auth()->user()->role, ['write', 'admin']))
        <x-button class="bg-green-400 hover:bg-green-500" wire:click="openAddCommsLogModal">Add Comms Log</x-button>

        <table class="min-w-full divide-y divide-gray-200">
            <thead>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Time
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Call Sign
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Message
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
            </th>
            </thead>
            <tbody>
            @foreach($commsLog as $log)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $log->time }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $log->call_sign }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $log->message }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $log->action }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <x-modal wire:model.defer="showCreateLogEntryModal">
            <x-slot name="title">
                Add Comms Log
            </x-slot>

            <x-slot name="body">
                <div class="space-y-6">
                    <div class="my-0">
                        @foreach($errors->all() as $error)
                            <li class="text-red-600">{{$error}}</li>
                        @endforeach
                    </div>

                    <div>
                        <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                        <div class="mt-1">
                            <input type="text" wire:model.defer="time" id="time" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ now()->format('H:m') }}">
                        </div>
                    </div>

                    <div>
                        <label for="call_sign" class="block text-sm font-medium text-gray-700">Call Sign</label>
                        <div class="mt-1">
                            <input type="text" wire:model.defer="call_sign" id="call_sign" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <div class="mt-1">
                            <input type="text" wire:model.defer="message" id="message" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="action" class="block text-sm font-medium text-gray-700">Action</label>
                        <div class="mt-1">
                            <input type="text" wire:model.defer="action" id="action" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-button class="bg-gray-400 hover:bg-gray-500" wire:click="$set('showCreateLogEntryModal', false)">
                    Close
                </x-button>

                <x-button class="bg-red-400 hover:bg-red-500" wire:click="resetCreateCommsLogEntryForm">
                    Reset Form
                </x-button>

                <x-button wire:click="storeCommsLog" class="bg-green-400 hover:bg-green-500">
                    Add Comms Log
                </x-button>
            </x-slot>
        </x-modal>
    @endif
</div>
