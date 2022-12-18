<div class="space-y-8">
    {{-- Breadcrumb --}}
    <x-kursus.tutor.detail-tutor.breadcrumb>
        <x-slot:page1>Kursus</x-slot:page1>
        <x-slot:page2>Tutor</x-slot:page2>
        <x-slot:page3>Profil Tutor</x-slot:page3>
    </x-kursus.tutor.detail-tutor.breadcrumb>

    {{-- Title --}}
    <h3 class="text-3xl leading-10 font-bold">{{ 'Profil Tutor' }}</h3>

    {{-- Tutor --}}
    <div>
        <div>
            <x-kursus.tutor-card>
                <x-slot:image>
                    https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80
                </x-slot:image>
                <x-slot:nama>Will Smith</x-slot:nama>
                <x-slot:tarif>Rp50.000,00/jam</x-slot:tarif>
                <x-slot:lokasi>Surabaya</x-slot:lokasi>
                <x-slot:sesi>Tersedia Sesi Daring</x-slot:sesi>
                <x-slot:anak>20 anak/Panti</x-slot:anak>
            </x-kursus.tutor-card>
        </div>
    </div>

    {{-- Pagination --}}
    <nav class="px-4 flex items-center justify-between sm:px-0">
        <div class="-mt-px w-0 flex-1 flex">
            <a href="#"
                class="border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-blue-500 hover:text-blue-600">
                <!-- Heroicon name: solid/arrow-narrow-left -->
                <svg class="mr-3 h-5 w-5 text-blue-500 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Previous
            </a>
        </div>
        <div class="hidden md:-mt-px md:flex">
            <a href="#"
                class="bg-blue-500 text-white rounded py-2 px-4 inline-flex items-center text-sm font-medium"
                aria-current="page">
                1 </a>
            <a href="#"
                class="border-transparent text-gray-500 hover:text-blue-500 hover:border-gray-300 py-2 px-4 inline-flex items-center text-sm font-medium">
                2 </a>
            <a href="#"
                class="border-transparent text-gray-500 hover:text-blue-500 hover:border-gray-300 py-2 px-4 inline-flex items-center text-sm font-medium">
                3 </a>
            <span class="border-transparent text-gray-500 py-2 px-4 inline-flex items-center text-sm font-medium">
                ... </span>
            <a href="#"
                class="border-transparent text-gray-500 hover:text-blue-500 hover:border-gray-300 py-2 px-4 inline-flex items-center text-sm font-medium">
                8 </a>
            <a href="#"
                class="border-transparent text-gray-500 hover:text-blue-500 hover:border-gray-300 py-2 px-4 inline-flex items-center text-sm font-medium">
                9 </a>
            <a href="#"
                class="border-transparent text-gray-500 hover:text-blue-500 hover:border-gray-300 py-2 px-4 inline-flex items-center text-sm font-medium">
                10 </a>
        </div>
        <div class="-mt-px w-0 flex-1 flex justify-end">
            <a href="#"
                class="border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-blue-500 hover:text-blue-600">
                Next
                <!-- Heroicon name: solid/arrow-narrow-right -->
                <svg class="ml-3 h-5 w-5 text-blue-500 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </nav>

</div>
