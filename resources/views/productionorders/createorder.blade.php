<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nalozi') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <div class="flex max-w-5xl mx-auto sm:px-4 lg:px-2">
            <div class="bg-white grid grid-cols-3 gap-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="col-span-2 p-6 text-gray-900 dark:text-gray-100 border-r border-gray-300 dark:border-gray-700">
                    {{ __("Kreiraj nalog.") }}

                    <form method="POST" action="{{ route('productionorders.store') }}">
                        @csrf
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="OrderNumber" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Order Number</label>
                                <input type="text" name="OrderNumber" id="orderNumber" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('OrderNumber') }}" required />
                            </div>
                            <div>
                                <label for="OrderDate" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Order Date</label>
                                <input type="date" name="OrderDate" id="orderDate" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('OrderDate') }}" required />
                            </div>
                            <div class="col-span-2">
                                <label for="Description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                                <textarea name="Description" id="description" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>{{ old('Description') }}</textarea>
                            </div>
                            <div>
                                <label for="Status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                                <input type="text" name="Status" id="status" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('Status') }}" required />
                            </div>
                            <div>
                                <label for="CurrentEmployee" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Current Employee</label>
                                <input type="text" name="CurrentEmployee" id="currentEmployee" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('CurrentEmployee') }}" required />
                            </div>
                            <div>
                                <label for="BojaDuzinaProvodnika" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Boja Duzina Provodnika</label>
                                <input type="text" name="BojaDuzinaProvodnika" id="bojaDuzinaProvodnika" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('BojaDuzinaProvodnika') }}" required />
                            </div>
                            <div>
                                <label for="Pakovanje" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Pakovanje</label>
                                <input type="text" name="Pakovanje" id="pakovanje" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('Pakovanje') }}" required />
                            </div>
                            <div>
                                <label for="AtestPaketa" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Atest Paketa</label>
                                <input type="text" name="AtestPaketa" id="atestPaketa" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('AtestPaketa') }}" required />
                            </div>
                            <div>
                                <label for="CeOznaka" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Ce Oznaka</label>
                                <input type="text" name="CeOznaka" id="ceOznaka" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('CeOznaka') }}" required />
                            </div>
                            <div>
                                <label for="KlasaOpasnosti" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Klasa Opasnosti</label>
                                <input type="text" name="KlasaOpasnosti" id="klasaOpasnosti" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('KlasaOpasnosti') }}" required />
                            </div>
                            <div>
                                <label for="UNBroj" class="block text-sm font-medium text-gray-700 dark:text-gray-200">UN Broj</label>
                                <input type="text" name="UNBroj" id="unBroj" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('UNBroj') }}" required />
                            </div>
                            <div>
                                <label for="RokIsporuke" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Rok Isporuke</label>
                                <input type="text" name="RokIsporuke" id="rokIsporuke" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('RokIsporuke') }}" required />
                            </div>
                            <div>
                                <label for="DatumPredaje" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Datum Predaje</label>
                                <input type="date" name="DatumPredaje" id="datumPredaje" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('DatumPredaje') }}" required />
                            </div>
                            <div>
                                <label for="DatumPrijema" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Datum Prijema</label>
                                <input type="date" name="DatumPrijema" id="datumPrijema" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('DatumPrijema') }}" required />
                            </div>
                            <div class="col-span-2">
                                <label for="Napomena" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Napomena</label>
                                <textarea name="Napomena" id="napomena" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>{{ old('Napomena') }}</textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="ProizvodId" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Proizvod ID</label>
                                <select name="ProizvodId" id="proizvodId" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('ProizvodId') == $product->id ? 'selected' : '' }}>{{ $product->Naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-md
                                           font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600
                                           focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 dark:focus:ring-gray-600
                                           disabled:opacity-25 transition ease-in-out duration-150">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-span-1 p-2 grid grid-cols-1 bg-white dark:bg-gray-800">
                    <div class="mt-8">
                        <label for="productSelect" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Add Additional Product</label>
                        <div class="flex items-center mt-2">
                            <select id="productSelect" class="form-input rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-200">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->Naziv }}</option>
                                @endforeach
                            </select>
                            <button type="button" id="addProductButton" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 dark:focus:ring-gray-600 disabled:opacity-25 transition ease-in-out duration-150">
                                Add Product
                            </button>
                        </div>
                        <ul id="productList" class="mt-4 list-disc list-inside text-gray-700 dark:text-gray-200"></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-5xl mx-auto sm:px-4 lg:px-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

            <div class="mt-8">
                <label for="labelInput" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Label</label>
                <input type="text" id="labelInput" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" />

                <label for="descriptionInput" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mt-4">Description</label>
                <textarea id="descriptionInput" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200"></textarea>

                <button type="button" id="addLabelButton" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 dark:focus:ring-gray-600 disabled:opacity-25 transition ease-in-out duration-150">
                    Add Label and Description
                </button>

                <ul id="labelList" class="mt-4 list-disc list-inside text-gray-700 dark:text-gray-200"></ul>
            </div>

        </div>
    </div>
    <div class="container d-flex flex-column align-items-center justify-content-center">


</x-app-layout>
@vite('resources/js/nalog.js')
