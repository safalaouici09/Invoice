<section class=" bg-gray-50 dark:bg-gray-900 w-full flex items-center mt-2">
    <div class=" w-full shadow-md sm:rounded-lg">
        <!-- Start coding here -->
        <div class=" ">
            <div class="flex flex-col items-center space-x-7 p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">


                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <x-select placeholder="Sélectionner un enfant" :options=$comboEleve option-label="name"
                        option-value="id" wire:model.live="eleveId" />

                </div>
                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input wire:model.live='isPayed' type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">payer</span>
                    </label>
                </div>
                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <button wire:click='refresh'
                        class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        type="button">
                        Refresh
                    </button>
                </div>


            </div>
        </div>



        <div class=" overflow-x-auto ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nom élève
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Montant
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Montant reste
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Operation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date prevue payement
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Statut
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        {{-- <tr wire:loading.delay.longest wire:key="loading-elem{{ $index }}">
                            <td colspan="100%">
                                <div class="w-screen flex items-center justify-center py-16">
                                    <livewire:spinner wire:key="loading-elem-spinner{{ $index }}" />


                                </div>
                            </td>
                        </tr> --}}
                        <tr wire:key='data-{{ $item['contract_paiement_id'] }}'
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <p>{{ $item['eleve'] }}</p>
                            </th>
                            <td class="px-6 py-4">
                                {{ $item['montant'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['montant_reste'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['operation_type_designation'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['date_prevue_reglement'] }}
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($item['is_paid'] == 1)
                                    <div class="flex items-center">

                                        <div class="inline-block w-4 h-4 mr-2 bg-green-400 rounded-full"></div>
                                        Payé
                                    @else
                                        <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full"> </div>
                                        Non payé
                                    </div>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-right">
                                @if ($item['is_paid'] == 0)
                                    <button wire:loading.attr="disabled" wire:loading.class="opacity-50"
                                        wire:click="payer('{{ $index }}')"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Payer</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</section>
