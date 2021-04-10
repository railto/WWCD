<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Location
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Incident Type
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Start Date
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Start Time
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            End Time
        </th>
        </thead>
        <tbody>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->location }}
        </td>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->type }}
        </td>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ Carbon\Carbon::parse($search->start)->format('d/m/Y') }}
        </td>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ Carbon\Carbon::parse($search->start)->format('H:i') }}
        </td>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->end ? Carbon\Carbon::parse($search->end)->format('H:i') : ''}}
        </td>
        </tbody>
    </table>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Officer In Charge
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Safety Officer
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Search Manager
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Section Leader
        </th>
        </thead>
        <tbody>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->officer_in_charge }}
        </td>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->safety_officer }}
        </td>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->search_manager }}
        </td>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->section_leader }}
        </td>
        </tbody>
    </table>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Radio Operator
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Scribe
        </th>
        </thead>
        <tbody>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->radio_operator }}
        </td>
        <td  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $search->scribe }}
        </td>
        </tbody>
    </table>
</div>
