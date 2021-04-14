<div>
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
                <livewire:search.teams.search-team :search-team="$searchTeam" :key="$searchTeam->id"/>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
