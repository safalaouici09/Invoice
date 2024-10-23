<section class="bg-gray-50 dark:bg-gray-900  w-full mt-2 ">
<div class="w-full">
    <!-- the bar of dates and buttons  -->
    <div class="w-full">
    <!-- the bar of dates and buttons  -->

    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden min-h-[70px]">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="flex flex-col md:flex-row w-full md:w-1/3 ">
                    <div class="w-full md:w-1/2 mr-2">
                        <x-datetime-picker placeholder="Date début" without-time without-tips wire:model="date_debut" />

                    </div>
                    <div class="w-full md:w-1/2 mr-2">
                        <x-datetime-picker placeholder="Date Fin" without-time without-tips wire:model="date_fin" />
                    </div>
                </div>
            <div class="mt-4"></div>
            <div class="flex flex-col md:flex-row w-full md:w-1/2 space-y-3 md:space-y-0 md:space-x-4 items-stretch">
                <div class="w-full  mr-2">
                    <input type="numero" wire:model='chiffreAffaire' class="focus:shadow-soft-primary-outline text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Chiffre d'affaire" aria-label="Chiffre d'affaire" aria-describedby="email-addon" />
                </div>
                <div class="w-full  mr-2">
                    <input type="numero" wire:model='chiffreAffaireDeclarer' class="focus:shadow-soft-primary-outline text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Chiffre d'affaire à déclarer " aria-label="Chiffre d'affaire" aria-describedby="email-addon" />
                </div>
                <div class="w-full  mr-2">
                    <input type="numero" wire:model='percentage' class="focus:shadow-soft-primary-outline text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Percentage " aria-label="Percentage" aria-describedby="email-addon" />
                </div>
                <div class="flex flex-grow items-center justify-end">
                    <button class="flex items-center justify-center py-2 px-4 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="submit" wire:click="calculatePercentage">
                        Afficher
                    </button>
                   

                </div>
                    <div class="flex flex-grow items-center justify-end">
                    <button class="flex items-center justify-center py-2 px-4 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="submit" wire:click="calculatePercentage">
                        export
                    </button>
                   

                </div>


               
            </div>
        </div>
    </div>
</div>

  
        </div>
        <div class="mt-4"></div>
        <!-- espace des paiement enligne   -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden min-h-[400px]">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full ">
                   
                <div class="mr-4">
                <span class="text-lg font-bold ">
            les paiements traçable

            </span>
                
                </div>
             
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nom élèves</th>
                            <th scope="col" class="px-4 py-3">Montant</th>   
                            <th scope="col" class="px-4 py-3">Montant à déclarer</th>
                            <th scope="col" class="px-4 py-3">Description </th>
                            <th scope="col" class="px-4 py-3">Date d'opération</th>
                            <th scope="col" class="px-4 py-3">
                                    Méthode de paiement
                                    </th>
                        </tr>
                    </thead>
                   
                    <tbody>
                    @foreach ($paiementTracable as $index => $item)
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
                                {{ $item['montant']  }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['operation_type_designation'] }}
                            </td>
                            <td class="px-6 py-4">
    {{ \Carbon\Carbon::parse($item['date_day'])->format('Y-m-d') }}
</td>
                            <td class="px-6 py-4">
                                {{ $item['mode_paiement'] }}
                            </td>
                          
                           
                            
                        </tr>
                    @endforeach
                </tbody>
                    </table>
                    </div>
                </div>  
            </div>
        <div class="mt-4"></div>
        <!-- espace des paiements non traçables-->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden min-h-[400px]">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full ">
                   
                <div class="mr-4">
                <span class="text-lg font-bold ">
            les paiements non traçables

                </span>
                
            </div>
           
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nom élèves</th>
                            <th scope="col" class="px-4 py-3">Montant</th>   
                            <th scope="col" class="px-4 py-3">Montant à déclarer</th>
                            <th scope="col" class="px-4 py-3">Description </th>
                            <th scope="col" class="px-4 py-3">Date d'opération</th>
                            <th scope="col" class="px-4 py-3">
                                    Méthode de paiement
                                    </th>
                        </tr>
                    </thead>
                   
                    <tbody>
                    @foreach ($paiementNonTracable as $index => $item)
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
                                {{ $item['montant']  }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['montant'] * $percentage/100 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['operation_type_designation'] }}
                            </td>
                            <td class="px-6 py-4">
    {{ \Carbon\Carbon::parse($item['date_day'])->format('Y-m-d') }}
</td>
                            <td class="px-6 py-4">
                                {{ $item['mode_paiement'] }}
                            </td>
                          
                           
                            
                        </tr>
                    @endforeach
                </tbody>
                    </table>
                </div>
            </div>  
        </div>
       

</section>