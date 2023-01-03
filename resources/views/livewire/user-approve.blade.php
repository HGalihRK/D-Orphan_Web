<div>
    Silakan Lengkapi Data Terlebih Dahulu
    <hr>
    <div class="w-fit self-center">
        <div class="grid gap-2">
            <div class="space-y-1">
                <x-label>
                    <x-slot:for>name</x-slot:for>
                    <x-slot:slot>
                        @if (auth()->user()->user_type == 'Pengurus Panti')
                            Nama Panti Asuhan
                        @else
                            Rekening
                        @endif
                    </x-slot:slot>
                </x-label>
                @if (auth()->user()->user_type == 'Pengurus Panti')
                    <x-input wire:model="name">
                        <x-slot:type>text</x-slot:type>
                        <x-slot:name>name</x-slot:name>
                        <x-slot:id>name</x-slot:id>
                        <x-slot:placeholder>Panti Asuhan Cinta Ini Abadi</x-slot:placeholder>
                    </x-input>
                @else
                    <x-input wire:model="bank_account">
                        <x-slot:type>text</x-slot:type>
                        <x-slot:name>bank_account</x-slot:name>
                        <x-slot:id>bank_account</x-slot:id>
                        <x-slot:placeholder>XXXXXXX</x-slot:placeholder>
                    </x-input>
                @endif
            </div>

            <div class="space-y-1">
                <x-label>
                    <x-slot:for>phone_number</x-slot:for>
                    <x-slot:slot>Nomor Telepon</x-slot:slot>
                </x-label>

                <x-input wire:model="phone_number">
                    <x-slot:type>text</x-slot:type>
                    <x-slot:name>phone_number</x-slot:name>
                    <x-slot:id>phone_number</x-slot:id>
                    <x-slot:placeholder>08XXXXXXXX</x-slot:placeholder>
                </x-input>
            </div>

            <div class="space-y-1">
                <x-label>
                    <x-slot:for>address</x-slot:for>
                    <x-slot:slot>Alamat</x-slot:slot>
                </x-label>

                <x-input wire:model="address">
                    <x-slot:type>text</x-slot:type>
                    <x-slot:name>address</x-slot:name>
                    <x-slot:id>address</x-slot:id>
                    <x-slot:placeholder>Jl. Cinta Ini</x-slot:placeholder>
                </x-input>
            </div>

            <div class="space-y-1">
                <x-label>
                    <x-slot:for>description</x-slot:for>
                    <x-slot:slot>Deskripsi</x-slot:slot>
                </x-label>

                <x-input wire:model="description">
                    <x-slot:type>text</x-slot:type>
                    <x-slot:name>description</x-slot:name>
                    <x-slot:id>description</x-slot:id>
                    <x-slot:placeholder>Deskripsi</x-slot:placeholder>
                </x-input>
            </div>
            <button wire:click='openModalConfirmation'
                class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-green-500 hover:bg-green-600 focus:ring focus:ring-green-500 focus:ring-opacity-50 active:bg-green-500 active:border-green-500">
                <p class="font-semibold text-white">Simpan</p>
            </button>
            <div>
                <button wire:click='resetForm'
                    class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-red-500 hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-50 active:bg-red-500 active:border-red-500">
                    <p class="font-semibold text-white">Reset</p>
                </button>
            </div>

            @if (auth()->user()->user_type == 'Tutor')
                Tambah Jadwal
                <a wire:click='addData' class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        <title>Tambah</title>
                    </svg>
                </a>
                <div class="space-y-1">
                    {{-- Dropdown Sort --}}
                    <select id="day" name="day" wire:model="day"
                        class="dropdown w-fit rounded-md shadow-sm pl-3 pr-10 font-medium border-transparent focus:border-transparent bg-blue-500 text-white focus:ring focus:ring-blue-500 focus:ring-opacity-50 cursor-pointer">

                        @foreach ($days as $item)
                            <option value="{{ $loop->iteration }}">
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1">
                    <x-label>
                        <x-slot:for>start_time</x-slot:for>
                        <x-slot:slot>Jam Mulai</x-slot:slot>
                    </x-label>

                    <x-input wire:model="start_time">
                        <x-slot:type>text</x-slot:type>
                        <x-slot:name>start_time</x-slot:name>
                        <x-slot:id>start_time</x-slot:id>
                        <x-slot:placeholder>00:00:00</x-slot:placeholder>
                    </x-input>
                </div>

                <div class="space-y-1">
                    <x-label>
                        <x-slot:for>end_time</x-slot:for>
                        <x-slot:slot>Jam Akhir</x-slot:slot>
                    </x-label>

                    <x-input wire:model="end_time">
                        <x-slot:type>text</x-slot:type>
                        <x-slot:name>end_time</x-slot:name>
                        <x-slot:id>end_time</x-slot:id>
                        <x-slot:placeholder>00:00</x-slot:placeholder>
                    </x-input>
                </div>

                <table class="min-w-full">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-fit">
                                No.</th>
                            <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-fit">
                                Hari</th>
                            <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-fit">
                                Jam Awal</th>
                            <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-fit">
                                Jam Akhir</th>
                            <th scope="col" class="sticky top-0 z-10 px-3 py-3.5 text-left font-semibold w-fit">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tutorDayTimeRanges as $item)
                            <tr class="odd:bg-white even:bg-gray-100">
                                <td class="whitespace-nowrap px-3 py-4 w-fit">
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->dayTimeRange->day->day }}
                                </td>
                                <td>
                                    {{ $item->dayTimeRange->start_time }}
                                </td>
                                <td>
                                    {{ $item->dayTimeRange->end_time }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 flex gap-2">
                                    {{-- Hapus --}}
                                    <a wire:click.prevent='deleteTutorDayTimeRange({{ $item->id }})'
                                        class="cursor-pointer text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            <title>Hapus</title>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    @if ($showFormConfirmation)
        <div class="fixed z-50 inset-0 overflow-y-hidden" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-fit sm:w-full sm:p-6 space-y-8">
                    <div>
                        <p class="text-2xl leading-8 font-semibold text-center" id="modal-title">
                            Simpan
                        </p>
                        <hr class="my-4">
                        <p class="text-gray-500">Konfirmasi bahwa data @yield('title') yang Anda pilih akan disimpan
                        </p>
                    </div>
                    <div class="grid gap-4 lg:flex">
                        <button wire:click='closeModalConfirmation'
                            class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-red-100 hover:bg-red-200 focus:ring focus:ring-red-100 focus:ring-opacity-50 active:bg-red-100 active:border-red-100">
                            <p class="font-semibold text-red-700">Batal</p>
                        </button>
                        <button wire:click='saveUser'
                            class="w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2 leading-6 bg-red-500 hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-50 active:bg-red-500 active:border-red-500">
                            <p class="font-semibold text-white">Simpan</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
