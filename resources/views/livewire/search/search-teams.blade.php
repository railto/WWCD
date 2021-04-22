<div>
    <x-button class="bg-green-400 hover:bg-green-500" wire:click="$set('showCreateSearchTeamModal', true)">Add Team</x-button>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Team Name
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Team Leader
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Medic
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Responder 1
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Responder 2
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Responder 3
        </th>
        </thead>
        <tbody>
        @foreach($searchTeams as $searchTeam)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $searchTeam->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $searchTeam->team_leader }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $searchTeam->medic }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $searchTeam->responder_1 }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $searchTeam->responder_2 }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $searchTeam->responder_3 }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <x-modal wire:model.defer="showCreateSearchTeamModal">
        <x-slot name="title">
            Create New Search Team
        </x-slot>

        <x-slot name="body">
            <div class="space-y-6">
                <div class="my-0">
                    @foreach($errors->all() as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Team Name</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="name" id="name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="team_leader" class="block text-sm font-medium text-gray-700">Team Leader</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="team_leader" id="team_leader" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="medic" class="block text-sm font-medium text-gray-700">Team Medic</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="medic" id="medic" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="responder_1" class="block text-sm font-medium text-gray-700">Responder 1</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="responder_1" id="responder_1" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="responder_2" class="block text-sm font-medium text-gray-700">Responder 2</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="responder_2" id="responder_2" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="responder_3" class="block text-sm font-medium text-gray-700">Responder 3</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="responder_3" id="responder_3" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button class="bg-gray-400 hover:bg-gray-500" wire:click="$set('showCreateSearchTeamModal', false)">
                Close
            </x-button>

            <x-button class="bg-red-400 hover:bg-red-500" wire:click="resetCreateSearchTeamForm">
                Reset Form
            </x-button>

            <x-button wire:click="storeSearchTeam" class="bg-green-400 hover:bg-green-500">
                Add Team
            </x-button>
        </x-slot>
    </x-modal>
</div>
