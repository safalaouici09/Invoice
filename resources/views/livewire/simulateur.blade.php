<section class="bg-gray-50 dark:bg-gray-900  w-full mt-2 ">
    <div class=" w-full">
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
  
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <button
                            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300  rounded-lg  me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            type="submit" wire:click="afficher">
                            Afficher
                        </button>

                    </div>
                </div>
            </div>  
        </div>
        </div>
        <div class="mt-4"></div>
        <!-- espace des paiement enligne   -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden min-h-[400px]">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/3">
                   
                <div class="mr-4">
                <span class="text-lg font-bold ">
            les paiements traçable

            </span>
                
                </div>
                <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nom élèves</th>
                                <th scope="col" class="px-4 py-3">Date</th>
                                <th scope="col" class="px-4 py-3">Heure</th>
                                <th scope="col" class="px-4 py-3">Matière</th>
                                <th scope="col" class="px-4 py-3">Commentaire</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        </table>
                        </div>
                    </div>
                </div>  
            </div>
        <div class="mt-4"></div>
        <!-- espace des paiements non traçables-->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden min-h-[400px]">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/3">
                   
                <div class="mr-4">
                <span class="text-lg font-bold ">
            les paiements non traçables

                </span>
                
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nom élèves</th>
                            <th scope="col" class="px-4 py-3">Date</th>
                            <th scope="col" class="px-4 py-3">Heure</th>
                            <th scope="col" class="px-4 py-3">Matière</th>
                            <th scope="col" class="px-4 py-3">Commentaire</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    </table>
                </div>
            </div>  
        </div>
       

</section>