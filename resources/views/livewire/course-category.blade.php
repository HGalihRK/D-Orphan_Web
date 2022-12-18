<div class="space-y-8">
    {{-- Title --}}
    <h3 class="text-3xl leading-10 font-bold">{{ 'Jelajahi kategori yang ingin dipelajari' }}</h3>

    {{-- Search Bar --}}
    <div class="flex justify-between gap-4 items-center">
        <x-search-bar>
            <x-slot:placeholder>Cari Kursus</x-slot:placeholder>
        </x-search-bar>
        {{-- Dropdown Sort --}}
        <x-kursus.dropdown>
            <x-slot:id>sort_category</x-slot:id>
            <x-slot:name>sort_category</x-slot:name>
            <x-slot:option1>Abjad Kategori</x-slot:option1>
            <x-slot:option2>Jumlah Tutor</x-slot:option2>
        </x-kursus.dropdown>
    </div>

    {{-- Kategori --}}
    <div>
        {{-- @if ($courseCategory->isEmpty())
            <h3>Belum ada kategori kursus yang tersedia</h3>
        @else --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @for ($i = 0; $i < 12; $i++)
                {{-- @foreach ($courseCategory as $item) --}}
                <a href="{{ route('tutor') }}">
                    <x-kursus.card>
                        <x-slot:image>
                            https://images.unsplash.com/photo-1529699211952-734e80c4d42b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80
                        </x-slot:image>
                        <x-slot:kategori>Catur</x-slot:kategori>
                        <x-slot:jumlahTutor>25 Tutor</x-slot:jumlahTutor>
                        <x-slot:button>Selengkapnya</x-slot:button>
                    </x-kursus.card>
                </a>
            @endfor
            {{-- @endforeach --}}
        </div>
        {{-- @endif --}}
    </div>

    {{-- Pagination --}}
    <x-pagination></x-pagination>
</div>
