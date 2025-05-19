<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nalozi') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Number</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proizvod</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Akcije</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($productionorders as $productionorder)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $productionorder->OrderNumber }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $productionorder->OrderDate }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $productionorder->Description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $productionorder->Status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('productionorders.show', $productionorder->id) }}" class="text-white bg-blue-500 hover:bg-blue-700 inline-block rounded px-2 py-1">Prikaži</a>
                                    <a href="{{ route('productionorders.edit', $productionorder->id) }}" class="text-white bg-yellow-500 hover:bg-yellow-700 inline-block rounded px-2 py-1 ml-2">Uredi</a>
                                    <form action="{{ route('productionorders.destroy', $productionorder->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-500 hover:bg-red-700 rounded px-2 py-1 ml-2">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    @vite(['resources/js/test.js'])
