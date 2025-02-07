<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nalog') }}
        </h2>
    </x-slot>
    <div class="flex py-12">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white grid grid-cols-3 gap-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="col-span-1 p-6 text-gray-900 dark:text-gray-100 border-r border-gray-300 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200">
                        <caption class="caption-top text-lg font-semibold text-gray-700">
                            Production Order Details
                        </caption>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product:</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $productionOrder->Description }}/{{ $productionOrder->VrstaProvodnika }} {{ $productionOrder->Tip }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Status:</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $productionOrder->Status }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Broj naloga:</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $productionOrder->OrderNumber }}/{{ \Carbon\Carbon::parse($productionOrder->Orderdate)->year }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Broj naloga:</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $productionOrder->OrderNumber }}/{{ \Carbon\Carbon::parse($productionOrder->Orderdate)->year }}</td>
                            </tr>

                        </tbody>
                    </table>

                    <br>


                    <div class="text-right">
                        <a href="{{ route('productionorders.orders') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 active:bg-green-700 disabled:opacity-25 transition">Back to Orders</a>
                    </div>

                </div>
                <div class="col-span-1 p-6 text-gray-900 dark:text-gray-100 border-r border-gray-300 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200">
                        <caption class="caption-top text-lg font-semibold text-gray-700">
                            Production Order Details
                        </caption>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product:</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $productionOrder->Description }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Status:</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $productionOrder->Status }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Broj naloga:</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $productionOrder->OrderNumber }}/{{ \Carbon\Carbon::parse($productionOrder->Orderdate)->year }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Broj naloga:</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $productionOrder->OrderNumber }}/{{ \Carbon\Carbon::parse($productionOrder->Orderdate)->year }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                {{--  Drugi dio  --}}
                <div class="col-span-1 p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                          <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                              <div class="overflow-y-auto max-h-96" style="max-height: 24rem;">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                  <thead>
                                    <tr>
                                      <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Numera</th>
                                      <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Količina</th>
                                      <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-gray-200 dark:divide-neutral-700">
                                  @foreach($products as $product)
                                  <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">No: {{ $product->NumeraProizvoda }}</td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $product->quantity }}</td>
                                      <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                          <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400" disabled>Izbriši</button>
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>

            </div>
        </div>
    </div>



</x-app-layout>
