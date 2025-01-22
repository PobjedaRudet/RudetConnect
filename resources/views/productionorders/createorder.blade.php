<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nalozi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Kreiraj nalog.") }}

                    <form method="POST" action="{{ route('productionorders.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="OrderNumber" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Order Number</label>
                                <input type="text" name="OrderNumber" id="OrderNumber" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('OrderNumber') }}" required />
                            </div>
                            <div>
                                <label for="OrderDate" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Order Date</label>
                                <input type="date" name="OrderDate" id="OrderDate" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('OrderDate') }}" required />
                            </div>
                            <div class="col-span-2">
                                <label for="Description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                                <textarea name="Description" id="Description" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>{{ old('Description') }}</textarea>
                            </div>
                            <div>
                                <label for="Status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                                <input type="text" name="Status" id="Status" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('Status') }}" required />
                            </div>
                            <div>
                                <label for="CurrentEmployee" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Current Employee</label>
                                <input type="text" name="CurrentEmployee" id="CurrentEmployee" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('CurrentEmployee') }}" required />
                            </div>
                            <div>
                                <label for="BojaDuzinaProvodnika" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Boja Duzina Provodnika</label>
                                <input type="text" name="BojaDuzinaProvodnika" id="BojaDuzinaProvodnika" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('BojaDuzinaProvodnika') }}" required />
                            </div>
                            <div>
                                <label for="Pakovanje" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Pakovanje</label>
                                <input type="text" name="Pakovanje" id="Pakovanje" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('Pakovanje') }}" required />
                            </div>
                            <div>
                                <label for="AtestPaketa" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Atest Paketa</label>
                                <input type="text" name="AtestPaketa" id="AtestPaketa" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('AtestPaketa') }}" required />
                            </div>
                            <div>
                                <label for="CeOznaka" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Ce Oznaka</label>
                                <input type="text" name="CeOznaka" id="CeOznaka" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('CeOznaka') }}" required />
                            </div>
                            <div>
                                <label for="KlasaOpasnosti" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Klasa Opasnosti</label>
                                <input type="text" name="KlasaOpasnosti" id="KlasaOpasnosti" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('KlasaOpasnosti') }}" required />
                            </div>
                            <div>
                                <label for="UNBroj" class="block text-sm font-medium text-gray-700 dark:text-gray-200">UN Broj</label>
                                <input type="text" name="UNBroj" id="UNBroj" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('UNBroj') }}" required />
                            </div>
                            <div>
                                <label for="RokIsporuke" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Rok Isporuke</label>
                                <input type="text" name="RokIsporuke" id="RokIsporuke" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('RokIsporuke') }}" required />
                            </div>
                            <div>
                                <label for="DatumPredaje" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Datum Predaje</label>
                                <input type="date" name="DatumPredaje" id="DatumPredaje" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('DatumPredaje') }}" required />
                            </div>
                            <div>
                                <label for="DatumPrijema" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Datum Prijema</label>
                                <input type="date" name="DatumPrijema" id="DatumPrijema" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" value="{{ old('DatumPrijema') }}" required />
                            </div>
                            <div class="col-span-2">
                                <label for="Napomena" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Napomena</label>
                                <textarea name="Napomena" id="Napomena" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>{{ old('Napomena') }}</textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="ProizvodId" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Proizvod ID</label>
                                <select name="ProizvodId" id="ProizvodId" class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700 dark:text-gray-200" required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('ProizvodId') == $product->id ? 'selected' : '' }}>{{ $product->Naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 dark:focus:ring-gray-600 disabled:opacity-25 transition ease-in-out duration-150">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-center justify-content-center">

</x-app-layout>
