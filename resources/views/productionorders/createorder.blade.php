<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nalozi') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white grid grid-cols-3 gap-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="col-span-2 p-6 text-gray-900 dark:text-gray-100 border-r border-gray-300 dark:border-gray-700">
                    <div class="text-center pb-5">
                        {{ __("Kreiraj nalog") }}
                    </div>


                    <input type="hidden" name="productListNew" id="productListNewInput">
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <div class="grid grid-cols-4 gap-4">
                        <div class="col-span-1">
                            <label for="OrderNumber" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Broj naloga</label>
                            @php
                                $lastOrderNumber = $workingOrders->last()->OrderNumber ?? 0;
                            @endphp
                            <input type="text" name="OrderNumber" id="orderNumber" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ $lastOrderNumber + 1 }}" disabled />
                        </div>
                        <div class="col-span-1">
                            <label for="VezaNaNalog" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Veza na nalog</label>
                            <select name="VezaNaNalog" id="vezaNaNalog" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>
                                @foreach($workingOrders as $order)
                                    <option value="{{ $order->id }}" {{ old('VezaNaNalog') == $order->id ? 'selected' : '' }}>{{ $order->OrderNumber }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="OrderDate" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Order Date</label>
                            <input type="date" name="OrderDate" id="orderDate" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('OrderDate') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="Description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Naziv</label>
                            <datalist id="productSuggestions"></datalist>
                            <input list="productSuggestions" name="Description" id="productInput" class="form-control rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('Description') }}" placeholder="Unesi naziv proizvoda..." />
                        </div>
                        <div class="col-span-1">
                            <label for="metraza" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Metraža</label>
                            <input type="number" name="Metraza" id="metraza" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('Metraza') }}" step="0.01" required />
                        </div>
                        <div class="col-span-1">
                            <label for="Status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                            <input type="text" name="Status" id="status" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('Status') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="VrstaProvodnika" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Vrsta provodnika</label>
                            <select name="VrstaProvodnika" id="vrstaProvodnika" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>
                                <option value="Al" {{ old('VrstaProvodnika') == 'Al' ? 'selected' : '' }}>Al</option>
                                <option value="Cu" {{ old('VrstaProvodnika') == 'Cu' ? 'selected' : '' }}>Cu</option>
                                <option value="Fe" {{ old('VrstaProvodnika') == 'Fe' ? 'selected' : '' }}>Fe</option>
                                <option value="V" {{ old('VrstaProvodnika') == 'V' ? 'selected' : '' }}>V</option>
                                <option value="Zn" {{ old('VrstaProvodnika') == 'Zn' ? 'selected' : '' }}>Zn</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="Tip" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tip</label>
                            <select name="Tip" id="tip" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>
                                <option value="A" {{ old('Tip') == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old('Tip') == 'B' ? 'selected' : '' }}>B</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="BojaDuzinaProvodnika" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Boja Duzina Provodnika</label>
                            <input type="text" name="BojaDuzinaProvodnika" id="bojaDuzinaProvodnika" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('BojaDuzinaProvodnika') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="Pakovanje" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Pakovanje</label>
                            <input type="text" name="Pakovanje" id="pakovanje" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('Pakovanje') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="AtestPaketa" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Atest Paketa</label>
                            <input type="text" name="AtestPaketa" id="atestPaketa" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('AtestPaketa') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="CeOznaka" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Ce Oznaka</label>
                            <input type="text" name="CeOznaka" id="ceOznaka" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('CeOznaka') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="KlasaOpasnosti" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Klasa Opasnosti</label>
                            <input type="text" name="KlasaOpasnosti" id="klasaOpasnosti" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('KlasaOpasnosti') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="UNBroj" class="block text-sm font-medium text-gray-700 dark:text-gray-200">UN Broj</label>
                            <input type="text" name="UNBroj" id="unBroj" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('UNBroj') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="RokIsporuke" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Rok Isporuke</label>
                            <input type="text" name="RokIsporuke" id="rokIsporuke" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('RokIsporuke') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="DatumPredaje" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Datum Predaje</label>
                            <input type="date" name="DatumPredaje" id="datumPredaje" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('DatumPredaje') }}" required />
                        </div>
                        <div class="col-span-1">
                            <label for="DatumPrijema" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Datum Prijema</label>
                            <input type="date" name="DatumPrijema" id="datumPrijema" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('DatumPrijema') }}" required />
                        </div>
                        <div class="col-span-2">
                            <label for="Napomena" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Napomena</label>
                            <textarea name="Napomena" id="napomena" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>{{ old('Napomena') }}</textarea>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">

                        <button id="pregledBtn" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-md
                            font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600
                            focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 dark:focus:ring-gray-600
                            disabled:opacity-25 transition ease-in-out duration-150">Pregled</button>
                    </div>



                </div>

                <div class="flex col-span-1 p-1 grid grid-cols-1 bg-white dark:bg-gray-800">
                    <div class="mt-8">
                        <label for="productSelect" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Numere proizvoda</label>
                        <ul id="productList" class="mt-4 list-disc list-inside text-gray-700 dark:text-gray-200"></ul>
                        <ul id="productListNew" class="mt-4 list-disc list-inside text-gray-700 dark:text-gray-200"></ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-center justify-content-center">


</x-app-layout>
@vite(['resources/js/nalog.js'])
@vite(['resources/js/test.js'])


