<div class=" bg-gray-50 dark:bg-gray-900 w-full mt-2">
    <div class="wrapper bg-white rounded shadow w-full ">
        <div class="header flex justify-between border-b p-2 w-full">
            <div
                class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                <x-select placeholder="Sélectionner un enfant" :options=$comboEleve option-label="name"
                    option-value="classe_id" wire:model.live="classe_id" />

            </div>

            <div class="mr-4">
                <span class="text-lg font-bold ">
                    {{ $classe_name }}
                </span>
            </div>

        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Heure</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Sun</span>
                    </th>
                    <th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Dimanche</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Dim</span>
                    </th>
                    <th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Lundi</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Lun</span>
                    </th>
                    <th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Mardi</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Mar</span>
                    </th>
                    <th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Mercredi</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Mer</span>
                    </th>
                    <th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Jeudi</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Jeu</span>
                    </th>
                    <th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Vendredi</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Ven</span>
                    </th>
                    <th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                        <span class="xl:block lg:block md:block sm:block hidden">Samedi</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Sam</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr class="text-center h-30" wire:key='data-{{ $item['ordre'] }}'>
                        <td class="border p-1 h-30 xl:w-30 lg:w-20 md:w-20 sm:w-10 w-10 overflow-auto  ">
                            <div
                                class="flex flex-col place-items-center h-30  xl:w-30 lg:w-20 md:w-20 sm:w-full w-10 mx-auto overflow-hidden">


                                <div class="bottom flex-grow h-30 py-1 w-full ">
                                    <div
                                        class="event  justify-self-center px-2 py-1 rounded-lg mt-1 overflow-hidden border border-purple-200 text-purple-800 bg-purple-100 ">

                                        <span class="time">
                                            {{ $item['heure_debut'] . ' ' . $item['heure_fin'] }}
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </td>
                        @foreach ($item['cours'] as $cours)
                            @if ($cours['emploi_du_temps_id'] == -1)
                                <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto ">
                                    <div class="bottom flex-grow h-30 py-1 w-full ">

                                    </div>
                                </td>
                            @else
                                <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto ">
                                    <div class="bottom flex-grow h-30 py-1 w-full ">
                                        <div
                                            class="event  px-2 py-1 rounded-lg mt-1 overflow-hidden border border-blue-200 text-blue-800 bg-blue-100">
                                            <span class="event-name font-semibold">
                                                {{ $cours['matiere_designation'] }}
                                            </span>
                                        </div>

                                        <div
                                            class="event px-2 py-1 rounded-lg mt-1 overflow-hidden border border-red-200 text-red-800 bg-red-100">
                                            <span class="time">
                                                {{ $cours['professeur'] }}
                                            </span>
                                        </div>
                                        <div
                                            class="event px-2 py-1 rounded-lg mt-1 overflow-hidden border border-green-200 text-green-800 bg-green-100git">
                                            <span class="time">
                                                {{ $cours['salle_designation'] }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        @endforeach
                        {{-- <td
                            class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
                            <div
                                class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                                <div class="top h-5 w-full">
                                    <span class="text-gray-500">3</span>
                                </div>
                                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
                            </div>
                        </td>
                        <td
                            class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
                            <div
                                class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                                <div class="top h-5 w-full">
                                    <span class="text-gray-500">4</span>
                                </div>
                                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
                            </div>
                        </td>
                        <td
                            class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
                            <div
                                class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">
                                <div class="top h-5 w-full">
                                    <span class="text-gray-500">6</span>
                                </div>
                                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
                            </div>
                        </td>
                        <td
                            class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-hidden transition cursor-pointer duration-500 ease hover:bg-gray-300">
                            <div
                                class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">
                                <div class="top h-5 w-full">
                                    <span class="text-gray-500">7</span>
                                </div>
                                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer">
                                    <div class="event bg-blue-400 text-white rounded p-1 text-sm mb-1">
                                        <span class="event-name">
                                            Shopping
                                        </span>
                                        <span class="time">
                                            12:00~14:00
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td
                            class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
                            <div
                                class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">
                                <div class="top h-5 w-full">
                                    <span class="text-gray-500 text-sm">8</span>
                                </div>
                                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
                            </div>
                        </td>
                        <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto ">
                            <div
                                class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">
                                <div class="top h-5 w-full">
                                    <span class="text-gray-500 text-sm">9</span>
                                </div>
                                <div class="bottom flex-grow h-30 py-1 w-full "></div>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
                {{-- @dump($data); --}}
            </tbody>
        </table>
    </div>
</div>
