@section('title', 'Detail ' . $user->name)

<div class="space-y-8">
    <x-list-user.detail-user.breadcrumb>
        <x-slot:page1>
            @if (auth()->user())
                @if (auth()->user()->user_type == 'Tutor')
                    Panti Asuhan
                @else
                    Tutor
                @endif
            @else
                Panti Asuhan
            @endif
        </x-slot:page1>
        <x-slot:page2>
            @if (auth()->user())
                @if (auth()->user()->user_type == 'Tutor')
                    Detail Panti Asuhan
                @else
                    Detail Tutor
                @endif
            @else
                Detail Panti Asuhan
            @endif
        </x-slot:page2>
    </x-list-user.detail-user.breadcrumb>

    <p class="text-3xl leading-10 font-bold">
        @if (auth()->user())
            @if (auth()->user()->user_type == 'Tutor')
                Detail Panti Asuhan
            @else
                Detail Tutor
            @endif
        @else
            Detail Panti Asuhan
        @endif
    </p>

    <div class="grid rounded-2xl shadow bg-white lg:flex">
        <div class="lg:w-6/12">
            <img src=@if (auth()->user()) @if (Auth::user()->user_type == 'Tutor')
            "{{ $user->photo_url }}"
            @elseif(Auth::user()->user_type == 'Pengurus Panti' || Auth::user()->user_type == 'Admin')
            "{{ $user->user->profile_photo_path }}" @endif
            @else "{{ $user->photo_url }}" @endif
            alt=@if (auth()->user()) @if (Auth::user()->user_type == 'Tutor')
                        "{{ $user->name }}"
                    @elseif(Auth::user()->user_type == 'Pengurus Panti' || Auth::user()->user_type == 'Admin')
                        "{{ $user->user->name }}" @endif
        @else
            "{{ $user->name }}" @endif
            class="w-full h-full object-cover rounded-t-2xl rounded-b-none lg:rounded-l-2xl lg:rounded-r-none">
        </div>

        <div class="w-fit self-center">
            <div class="grid gap-4 p-4 lg:p-8">
                <p class="text-2xl leading-8 font-semibold text-gray-900">
                    @if (auth()->user())
                        @if (Auth::user()->user_type == 'Tutor')
                            {{ $user->name }}
                        @elseif(Auth::user()->user_type == 'Pengurus Panti' || Auth::user()->user_type == 'Admin')
                            {{ $user->user->name }}
                        @endif
                    @else
                        {{ $user->name }}
                    @endif
                </p>
                <div class="grid gap-1">
                    @if (auth()->user())
                        @if (Auth::user()->user_type == 'Tutor')
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <title>Nama {{ $user->user->user_type }}</title>
                                </svg>
                                <p class="text-lg leading-6 text-gray-700">{{ $user->user->name }}</p>
                            </div>
                        @endif
                    @else
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                <title>Nama {{ $user->user->user_type }}</title>
                            </svg>
                            <p class="text-lg leading-6 text-gray-700">{{ $user->user->name }}</p>
                        </div>
                    @endif
                    <div class="flex gap-2 items-center">
                        @if (auth()->user())
                            @if (Auth::user()->user_type == 'Tutor')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    <title>Jumlah Anak Panti Asuhan</title>
                                </svg>
                                <p class="text-lg leading-8 text-gray-700">
                                    @if (count($user->orphans) > 0)
                                        {{ count($user->orphans) }}
                                    @else
                                        0
                                    @endif Anak Panti
                                </p>
                            @endif
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <p class="text-lg leading-8 text-gray-700">
                                @if (count($user->orphans) > 0)
                                    {{ count($user->orphans) }}
                                @else
                                    0
                                @endif Anak Panti
                            </p>
                        @endif
                    </div>
                    @auth
                        @if (Auth::user()->user_type == 'Pengurus Panti' || Auth::user()->user_type == 'Admin')
                            <div class="w-fit lg:flex gap-2 items-center mb-2">
                                @foreach ($skills as $item)
                                    <span
                                        class="w-fit inline-flex items-center px-3 py-0.5 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                                        <svg class="-ml-1 mr-1.5 h-2 w-2 text-blue-400" fill="currentColor"
                                            viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
                                        {{ $item->name }}
                                    </span>
                                @endforeach
                            </div>
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                    <title>Jenis Kelamin</title>
                                </svg>
                                <p class="text-lg leading-8 text-gray-700">
                                    @if ($user->user->gender == 'Male')
                                        Pria
                                    @else
                                        Wanita
                                    @endif
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                <p class="text-lg leading-8 text-gray-700">{{ count($user->courses) }} kursus tersedia
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    <title>Jumlah kelas berhasil</title>
                                </svg>
                                <p class="text-lg leading-8 text-gray-700">
                                    {{ count($courseBookingDone) . ' kursus berhasil' }}
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    <title>Bergabung sejak</title>
                                </svg>
                                <p class="text-lg leading-8 text-gray-700">
                                    {{ date_format(date_create($user->user->created_at), 'd/m/Y') }}
                                </p>
                            </div>
                    </div>
                    @endif
                @endauth

                <p class="text-gray-500">{{ $user->description }}</p>

                <div class="mt-2">
                    @if (auth()->user())
                        @if (auth()->user()->user_type == 'Tutor')
                            <a href="{{ route('kirim-donasi', $user->user->id) }}">
                                <x-primary-button>Donasi Sekarang</x-primary-button>
                            </a>
                        @else
                            <a href="mailto:{{ $user->user->email }}">
                                <x-secondary-button>Kirim Surel</x-secondary-button>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('kirim-donasi', $user->user->id) }}">
                            <x-primary-button>Donasi Sekarang</x-primary-button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
