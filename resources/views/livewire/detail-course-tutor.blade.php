<div class="space-y-8">
    {{-- Breadcrumb --}}
    <x-kursus.tutor.detail-tutor.breadcrumb>
        <x-slot:page1>Kursus</x-slot:page1>
        <x-slot:page2>Tutor</x-slot:page2>
        <x-slot:page3>Profil Tutor</x-slot:page3>
    </x-kursus.tutor.detail-tutor.breadcrumb>

    <div class="grid lg:flex gap-8">
        <div class="grid gap-4 w-full lg:w-6/12">
            {{-- Title --}}
            <h3 class="text-3xl leading-10 font-bold">{{ 'Profil Tutor' }}</h3>
            {{-- Tutor --}}
            <x-kursus.tutor.detail-tutor.card>
                <x-slot:image>
                    https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80
                </x-slot:image>
                <x-slot:nama>Will Smith</x-slot:nama>
                <x-slot:kategori1>Catur</x-slot:kategori1>
                <x-slot:kategori2>Atletik</x-slot:kategori2>
                <x-slot:tarif>Rp50.000,00/jam</x-slot:tarif>
                <x-slot:lokasi>Surabaya</x-slot:lokasi>
                <x-slot:sesi>Tersedia Sesi Daring</x-slot:sesi>
                <x-slot:anak>20 anak/Panti</x-slot:anak>
                <x-slot:surel>willsmith@gmail.com</x-slot:surel>
                <x-slot:button>Reservasi Kursus</x-slot:button>
            </x-kursus.tutor.detail-tutor.card>
        </div>

        <div class="w-fit flex-col space-y-4">
            {{-- Description --}}
            <h3 class="text-3xl leading-10 font-bold">{{ 'Tentang Tutor' }}</h3>
            <p class="text-lg leading-8 text-gray-500">Saya telah berpengalaman selama lebih dari 5 tahun di kursus
                pelatihan Catur. Saya telah memenangi berbagai lomba, baik tingkat nasional maupun internasional serta
                memperoleh sertifikasi pelatihan. Saya sudah diakui sebagai Chess Master semenjak memenangkan Grand
                Final Chess Master Tournament.</p>
            {{-- Certificate --}}
            <h3 class="text-3xl leading-10 font-bold">{{ 'Sertifikat' }}</h3>
            <div class="flex gap-8 overflow-x-auto">
                <img src="/img/sertiwillsmith1.png">
                <img src="/img/sertiwillsmith2.png">
                <img src="/img/sertiwillsmith3.png">
            </div>
        </div>
    </div>
</div>
