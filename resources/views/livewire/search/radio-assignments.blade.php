<div>
    <x-button class="bg-green-400 hover:bg-green-500" wire:click="$set('showCreateRadioAssignmentModal', true)">Add Radio Assignment</x-button>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Call Sign
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Tetra Number
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Name
        </th>
        </thead>
        <tbody>
        @foreach($radioAssignments as $assignment)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $assignment->call_sign }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $assignment->tetra_number }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $assignment->name }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <x-modal wire:model.defer="showCreateRadioAssignmentModal">
        <x-slot name="title">
            Create New Radio Assignment
        </x-slot>

        <x-slot name="body">
            <div class="space-y-6">
                <div class="my-0">
                    @foreach($errors->all() as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach
                </div>

                <div>
                    <label for="call_sign" class="block text-sm font-medium text-gray-700">Call Sign</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="call_sign" id="call_sign" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="tetra_number" class="block text-sm font-medium text-gray-700">Tetra Number</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="tetra_number" id="tetra_number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="name" id="name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button class="bg-gray-400 hover:bg-gray-500" wire:click="$set('showCreateRadioAssignmentModal', false)">
                Close
            </x-button>

            <x-button class="bg-red-400 hover:bg-red-500" wire:click="resetCreateRadioAssignmentForm">
                Reset Form
            </x-button>

            <x-button wire:click="storeRadioAssignment" class="bg-green-400 hover:bg-green-500">
                Add Radio Assignment
            </x-button>
        </x-slot>
    </x-modal>
</div>
