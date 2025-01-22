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
                    {{ __("Prijavljeni ste u naloge.") }}
                    <div class="grid2 p-6 items-center text-center">
                        <a href="{{ url('/subcode/{subcode}') }}" ><button class="btn btn-outline-primary btn-custom">KREIRANJE</button></a>
                        <a href="{{ url('/subcode/{subcode}') }}" ><button class="btn btn-outline-primary btn-custom">NALOZI</button></a>
                        <a href="{{ url('/subcode/{subcode}') }}" ><button class="btn btn-outline-primary btn-custom">ODOBRENJA</button></a>
                        <a href="{{ url('/subcode/{subcode}') }}" ><button class="btn btn-outline-primary btn-custom">STATUSI</button></a>
                        <a href="{{ url('/subcode/{subcode}') }}" ><button class="btn btn-outline-primary btn-custom">STATUSI</button></a>
                        <a href="{{ url('/subcode/{subcode}') }}" ><button class="btn btn-outline-primary btn-custom">STATUSI</button></a>
                    </div>

                    <style>
                        .btn-custom {
                            width: 230px;
                            height: 100px;
                            border-radius: 8px;
                            border: 0.5px solid rgb(22, 22, 182);
                            transition: background-color 0.3s, color 0.3s;
                        }

                        .btn-custom:hover {
                            background-color: rgb(64, 64, 233);
                            color: white;
                        }

                        .grid2 {
                            display: grid;
                            grid-template-columns: repeat(3, 1fr);
                            gap: 10px;
                            justify-items: center;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-center justify-content-center">

</x-app-layout>
