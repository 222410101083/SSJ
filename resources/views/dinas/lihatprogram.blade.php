<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Konsultasi</title>
</head>

<body class="bg-primary">
    <header class="absolute inset-x-0 top-0 z-50">
        @include ('dinas.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-full flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg min-h-[80vh] p-24 relative">
                    @if($user->role->id==1)
                        <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32 absolute right-4 top-4" type="button"
                        id="add-profile-button"
                        onclick="window.location='{{route('dinas.editprogram',['id' => $program->id])}}'"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        EDIT
                        </button> 
                    @endif
                        <div class="">
                            <div class="font-semibold text-4xl">{{ $program->nama_program }}</div>
                            <div class="flex gap-2 my-4 text-lg">
                                <div class="">{{ $program->created_at->format('d/m/Y H:i T') }}</div>
                            </div>
                        </div>
                        <div class="">
                            <table class="w-full mt-8 border-collapse">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2">Sesi</th>
                                        <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                                        <th class="border border-gray-300 px-4 py-2">Waktu Mulai</th>
                                        <th class="border border-gray-300 px-4 py-2">Waktu Selesai</th>
                                        <th class="border border-gray-300 px-4 py-2">Puskeswan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwalprogram as $jadwal)
                                    <tr class="text-center">
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->sesi }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->tanggal }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->waktu_mulai }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->waktu_selesai }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->puskeswan->puskeswan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <div class=" mt-2">{!! $program->deskripsi !!}</div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
