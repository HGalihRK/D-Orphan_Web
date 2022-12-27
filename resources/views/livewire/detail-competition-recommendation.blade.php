<div class="space-y-8">
    <x-lomba.detail-lomba.breadcrumb>
        <x-slot:page1>Lomba</x-slot:page1>
        <x-slot:page2>Detail Lomba</x-slot:page2>
    </x-lomba.detail-lomba.breadcrumb>

    <p class="text-3xl leading-10 font-bold">{{ 'Detail Lomba' }}</p>

    <div class="grid rounded-2xl shadow bg-white lg:flex">
        <div class="lg:w-6/12">
            <img src="{{ $competitionRecommendation->competition->photo_url }}" alt="Lomba"
                class="w-full h-full object-cover rounded-t-2xl rounded-b-none lg:rounded-l-2xl lg:rounded-r-none"
                onerror="this.onerror=null;this.src='/img/placeholder.svg';">
        </div>

        <div class="w-fit self-center">
            <div class="grid gap-4 p-4 lg:p-8">
                <p class="text-2xl leading-8 font-semibold text-gray-900">
                    {{ $competitionRecommendation->competition->name }}
                </p>

                <div class="grid">
                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            <title>Jenjang</title>
                        </svg>
                        <p class="text-lg leading-8 text-gray-700">
                            {{ $competitionRecommendation->competition->jenjang }}</p>
                    </div>

                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            <title>Tanggal dimulai pendaftaran</title>
                        </svg>
                        <p class="text-lg leading-8 text-gray-700">
                            {{ date_format(date_create($competitionRecommendation->competition->registration_start_date), 'd/m/Y') }}
                        </p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <title>Jam dimulai pendaftaran</title>
                        </svg>
                        <p class="text-lg leading-8 text-gray-500">
                            {{ date_format(date_create($competitionRecommendation->competition->registration_start_hour), 'H:i') }}
                        </p>
                    </div>
                </div>

                <p class="text-gray-700">{{ $competitionRecommendation->competition->description }}</p>

                <a href="{{ $competitionRecommendation->competition->url }}" target="_blank" rel="noopener noreferrer">
                    <x-primary-button>Tautan Lomba</x-primary-button>
                </a>
            </div>
        </div>
    </div>
    <details open class="space-y-2">
        <summary class="text-xl leading-8 font-semibold">Rekomendasi</summary>

        <div class="overflow-x-auto shadow rounded">
            <table class="min-w-full">
                <thead class="bg-gray-500 text-white">
                    <tr>
                        <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-fit">
                            No.</th>
                        <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold">
                            Nama Anak</th>
                        <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold">
                            Dari Tutor</th>
                        <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold">
                            Deskripsi</th>
                    </tr>
                </thead>
                @if (!$competitionRecommendation)
                    <tbody class="bg-white">
                        <tr>
                            <td colspan="4" class="px-3 py-4">
                                <div
                                    class="grid gap-2 p-2 place-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                    </svg>
                                    <p>{{ 'Belum ada rekomendasi yang diberikan' }}</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @else
                    <tbody>
                        @foreach ($orphanCrs as $item)
                            <tr class="odd:bg-white even:bg-gray-100">
                                <td class="whitespace-nowrap px-3 py-4 w-fit">{{ $loop->iteration }}</td>
                                <td class="whitespace-nowrap px-3 py-4">{{ $item->orphan->name }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4">
                                    <a href="{{ route('detail-user', $item->competitionRecommendation->tutor->user->id) }}"
                                        class="text-blue-500">
                                        {{ $item->competitionRecommendation->tutor->user->name }}
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4">{{ $item->description }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </details>

    @if (Auth::user()->user_type == 'Tutor')
        <hr class="border-2">
        <form method="POST" action="/" class="space-y-6">
            @csrf

            <div class="flex justify-between items-center">
                <p class="text-lg leading-8 font-semibold text-gray-700">
                    Peserta Lomba
                </p>
                <a wire:click='' class="cursor-pointer" title="Tambah">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
            </div>
            <div class="space-y-4">
                <div class="space-y-1">
                    <x-label>
                        <x-slot:for>nama_panti_asuhan</x-slot:for>
                        <x-slot:slot>Nama Panti Asuhan</x-slot:slot>
                    </x-label>
                    <x-select>
                        <x-slot:id>nama_panti_asuhan</x-slot:id>
                        <x-slot:name>nama_panti_asuhan</x-slot:name>
                        <x-slot:option>
                            {{-- @foreach (Auth::user()->orphanage->name as $item) --}}
                            <option>Sinar Bangsa</option>
                            {{-- @endforeach --}}
                        </x-slot:option>
                    </x-select>
                </div>
                <div class="space-y-1">
                    <x-label>
                        <x-slot:for>nama_peserta_kursus</x-slot:for>
                        <x-slot:slot>Nama Peserta Lomba</x-slot:slot>
                    </x-label>
                    <x-select>
                        <x-slot:id>nama_peserta_kursus</x-slot:id>
                        <x-slot:name>nama_peserta_kursus</x-slot:name>
                        <x-slot:option>
                            {{-- @foreach (Auth::user()->orphanage->orphans as $item) --}}
                            <option>Ilham Kurniawan</option>
                            {{-- @endforeach --}}
                        </x-slot:option>
                    </x-select>
                </div>
            </div>

            <div class="overflow-x-auto shadow rounded">
                <table class="min-w-full">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-fit">
                                No.</th>
                            <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-full">
                                Nama Peserta Lomba</th>
                            <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-full">
                                Aksi</th>
                        </tr>
                    </thead>
                    {{-- @if (!competitionRecommendation)
                        <tbody class="bg-white">
                            <tr>
                                <td colspan="4" class="px-3 py-4">
                                    <div
                                        class="grid gap-2 p-2 place-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                        </svg>
                                        <p>{{ 'Belum ada rekomendasi yang diberikan' }}</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @else --}}
                    <tbody>
                        {{-- @foreach ($competitionRecommendation as $item) --}}
                        @php $number = 1 @endphp
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="whitespace-nowrap px-3 py-4 w-fit">{{ $number }}</td>
                            <td class="whitespace-nowrap px-3 py-4 w-full">Ilham Kurniawan</td>
                            <td class="whitespace-nowrap px-3 py-4 w-full">
                                <a wire:click='' class="cursor-pointer" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @php $number++ @endphp
                        {{-- @endforeach --}}
                    </tbody>
                    {{-- @endif --}}
                </table>
            </div>
        </form>
    @endif
</div>
