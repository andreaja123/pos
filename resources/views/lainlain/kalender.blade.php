@extends('layouts.admin')

@section('title', 'Kalender - Hanania POS')

@section('content')
    <section id="calendar-page" class="page-section active max-w-7xl mx-auto relative">

        <div class="flex flex-col lg:flex-row justify-between items-center mb-6 gap-4">
            <div class="flex items-center gap-4 w-full lg:w-auto justify-between lg:justify-start">
                <div
                    class="flex items-center bg-white dark:bg-darkCard rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm p-1">
                    <button onclick="location.href='?view={{ $view }}&{{ $view === 'month' ? 'month='.$prev->month.'&year='.$prev->year : 'date='.$prev->format('Y-m-d') }}'" class="p-2 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg text-slate-500 transition">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>
                    <button onclick="location.href='?view={{ $view }}&{{ $view === 'month' ? 'month='.$next->month.'&year='.$next->year : 'date='.$next->format('Y-m-d') }}'" class="p-2 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg text-slate-500 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    {{ $monthLabel }}
                </h2>
            </div>

            <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto justify-end">
                <div class="bg-white dark:bg-darkCard rounded-xl border border-slate-100 dark:border-slate-700 p-1 flex">
                    <button onclick="location.href='?view=month&month={{ \Carbon\Carbon::parse($contextDate)->month }}&year={{ \Carbon\Carbon::parse($contextDate)->year }}'" class="px-3 py-1.5 text-xs font-bold rounded-lg {{ $view === 'month' ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-500/20 dark:text-indigo-400' : 'text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700' }}">Bulan</button>
                    <button onclick="location.href='?view=week&date={{ $contextDate }}'" class="px-3 py-1.5 text-xs font-bold rounded-lg {{ $view === 'week' ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-500/20 dark:text-indigo-400' : 'text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700' }}">Minggu</button>
                    <button onclick="location.href='?view=day&date={{ $contextDate }}'" class="px-3 py-1.5 text-xs font-bold rounded-lg {{ $view === 'day' ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-500/20 dark:text-indigo-400' : 'text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700' }}">Hari</button>
                </div>

                <div class="relative group">
                    <button
                        class="flex items-center gap-2 bg-white dark:bg-darkCard px-4 py-2.5 rounded-xl border border-slate-100 dark:border-slate-700 text-sm font-bold text-slate-600 dark:text-slate-300 shadow-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-fill ph-globe"></i>
                        <span>ID</span>
                        <i class="ph-bold ph-caret-down"></i>
                    </button>
                    <div
                        class="absolute right-0 top-full mt-2 w-32 bg-white dark:bg-darkCard border border-slate-100 dark:border-slate-700 rounded-xl shadow-lg hidden group-hover:block z-10">
                        <a href="#"
                            class="block px-4 py-2 text-sm text-indigo-600 dark:text-indigo-400 font-bold bg-indigo-50 dark:bg-indigo-500/10">Indonesia</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-b-xl">English</a>
                    </div>
                </div>

                <button onclick="openModal()"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-indigo-200/50 dark:shadow-none transition flex items-center gap-2">
                    <i class="ph-bold ph-plus"></i>
                    <span class="hidden sm:inline">Event Baru</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="grid grid-cols-7 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-700/30">
                @foreach (['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $day)
                    <div
                        class="py-3 text-center text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        {{ $day }}
                    </div>
                @endforeach
            </div>

            @php
                $colorMap = [
                    'indigo' => ['bg' => 'bg-indigo-100 dark:bg-indigo-900/30', 'text' => 'text-indigo-700 dark:text-indigo-300', 'border' => 'border-indigo-500'],
                    'emerald' => ['bg' => 'bg-emerald-100 dark:bg-emerald-900/30', 'text' => 'text-emerald-700 dark:text-emerald-300', 'border' => 'border-emerald-500'],
                    'orange' => ['bg' => 'bg-orange-100 dark:bg-orange-900/30', 'text' => 'text-orange-700 dark:text-orange-300', 'border' => 'border-orange-500'],
                    'purple' => ['bg' => 'bg-purple-100 dark:bg-purple-900/30', 'text' => 'text-purple-700 dark:text-purple-300', 'border' => 'border-purple-500'],
                    'red' => ['bg' => 'bg-red-100 dark:bg-red-900/30', 'text' => 'text-red-700 dark:text-red-300', 'border' => 'border-red-500'],
                ];
            @endphp

            @if($view === 'month')
                <div class="grid grid-cols-7 auto-rows-fr bg-slate-100 dark:bg-slate-700 gap-px border-b border-slate-100 dark:border-slate-700">
                    @foreach ($days as $cell)
                        <div onclick="openModal('{{ $cell['date'] }}')"
                            class="relative p-2 min-h-[100px] lg:min-h-[140px] bg-white dark:bg-darkCard transition hover:bg-slate-50 dark:hover:bg-slate-700 cursor-pointer {{ $cell['inMonth'] ? '' : 'bg-slate-50/30 dark:bg-slate-800/30 text-slate-400' }}">

                            <span
                                class="absolute top-3 left-3 inline-flex items-center justify-center w-7 h-7 rounded-full text-sm font-bold {{ $cell['inMonth'] ? 'text-slate-700 dark:text-slate-300' : 'text-slate-400' }}">{{ $cell['day'] }}</span>

                            <div class="mt-8 space-y-2">
                                @foreach ($cell['events']->sortBy('time') as $event)
                                    @php $c = $colorMap[$event->color] ?? $colorMap['indigo']; @endphp
                                    <div onclick="event.stopPropagation(); openModal('{{ $cell['date'] }}', {{ $event->id }})"
                                        class="px-2 py-1 rounded text-xs truncate border-l-2 {{ $c['bg'] }} {{ $c['text'] }} {{ $c['border'] }}">
                                        <p class="font-bold truncate">{{ $event->title }}</p>
                                        @if($event->time)
                                            <p class="text-[10px] mt-0.5 opacity-80">{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach
                </div>
            @elseif($view === 'week')
                <div class="grid grid-cols-7 gap-3">
                    @foreach ($days as $cell)
                        <div class="bg-white dark:bg-darkCard p-4 min-h-[220px] rounded-xl border border-slate-100 dark:border-slate-700">
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <div class="text-sm font-bold">{{ \Carbon\Carbon::parse($cell['date'])->isoFormat('ddd') }}</div>
                                    <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($cell['date'])->format('D MMM') }}</div>
                                </div>
                                <div class="text-xs text-slate-400">{{ $cell['inMonth'] ? '' : '' }}</div>
                            </div>

                            <div class="space-y-3">
                                @forelse($cell['events']->sortBy('time') as $event)
                                    @php $c = $colorMap[$event->color] ?? $colorMap['indigo']; @endphp
                                    <div onclick="event.stopPropagation(); openModal('{{ $cell['date'] }}', {{ $event->id }})" class="p-3 rounded-lg border-l-2 {{ $c['bg'] }} {{ $c['text'] }} {{ $c['border'] }} hover:shadow-sm transition">
                                        <div class="flex justify-between items-start gap-3">
                                            <div class="flex-1">
                                                <div class="font-bold truncate">{{ $event->title }}</div>
                                                @if($event->description)
                                                    <div class="text-[12px] text-slate-600 dark:text-slate-400 mt-1 truncate">{{ $event->description }}</div>
                                                @endif
                                            </div>
                                            @if($event->time)
                                                <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-sm text-slate-400">Tidak ada event</div>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif($view === 'day')
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-white dark:bg-darkCard rounded-xl p-4 flex items-center justify-between border border-slate-100 dark:border-slate-700">
                        <div>
                            <h3 class="text-lg font-bold">{{ $monthLabel }}</h3>
                            <div class="text-sm text-slate-500">{{ \Carbon\Carbon::parse($days[0]['date'])->isoFormat('dddd, D MMMM YYYY') }}</div>
                        </div>
                        <button onclick="openModal('{{ $days[0]['date'] }}')" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-xl text-sm font-bold">Event Baru</button>
                    </div>

                    <div class="bg-white dark:bg-darkCard rounded-3xl p-4 border border-slate-100 dark:border-slate-700">
                        @if(count($days[0]['events']))
                            <div class="space-y-3">
                                @foreach($days[0]['events']->sortBy('time') as $event)
                                    @php $c = $colorMap[$event->color] ?? $colorMap['indigo']; @endphp
                                    <div onclick="openModal('{{ $days[0]['date'] }}', {{ $event->id }})" class="p-4 rounded-xl border-l-2 {{ $c['bg'] }} {{ $c['text'] }} {{ $c['border'] }} hover:shadow-sm transition">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <div class="font-bold">{{ $event->title }}</div>
                                                @if($event->description)
                                                    <div class="text-sm text-slate-600 dark:text-slate-400 mt-1">{{ $event->description }}</div>
                                                @endif
                                            </div>
                                            <div class="text-sm text-slate-500">{{ $event->time ? \Carbon\Carbon::parse($event->time)->format('H:i') : '' }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-sm text-slate-400">Belum ada event pada hari ini.</div>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        @if(session('success'))
            <div class="mt-4 text-sm text-green-600 font-bold">{{ session('success') }}</div>
        @endif


    </section>
    <div id="eventModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <form id="eventForm" action="{{ route('events.store') }}" method="POST" class="relative transform overflow-hidden rounded-3xl bg-white dark:bg-darkCard text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100 dark:border-slate-700">
                @csrf

                <div class="bg-slate-50 dark:bg-slate-700/50 px-6 py-4 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                    <h3 class="text-lg font-display font-bold text-slate-800 dark:text-white" id="modal-title">Buat Jadwal Baru</h3>
                    <button type="button" onclick="closeModal()" class="text-slate-400 hover:text-slate-500 dark:hover:text-white transition">
                        <i class="ph-bold ph-x text-lg"></i>
                    </button>
                </div>

                <div class="px-6 py-6 space-y-4">
                    <input type="hidden" name="_method" id="eventMethod" value="">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Judul Event</label>
                        <input id="eventTitle" name="title" type="text" placeholder="Contoh: Meeting Bulanan" value="{{ old('title') }}"
                            class="w-full rounded-xl border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2.5 px-4 font-medium">
                        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tanggal</label>
                            <input id="eventDate" name="date" type="date" value="{{ old('date') }}"
                                class="w-full rounded-xl border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2.5 px-4">
                            @error('date')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jam</label>
                            <input id="eventTime" name="time" type="time" value="{{ old('time') }}"
                                class="w-full rounded-xl border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2.5 px-4">
                            @error('time')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi</label>
                        <textarea id="eventDescription" name="description" rows="3" placeholder="Tambahkan detail..." class="w-full rounded-xl border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2.5 px-4 font-medium">{{ old('description') }}</textarea>
                        @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-3">Warna Label</label>
                        <div class="flex gap-3">
                            <label class="cursor-pointer">
                                <input id="colorIndigo" type="radio" name="color" value="indigo" class="peer sr-only" checked>
                                <div class="w-8 h-8 rounded-full bg-indigo-500 ring-2 ring-offset-2 ring-transparent peer-checked:ring-indigo-500 dark:ring-offset-slate-800 transition"></div>
                            </label>
                            <label class="cursor-pointer">
                                <input id="colorEmerald" type="radio" name="color" value="emerald" class="peer sr-only">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 ring-2 ring-offset-2 ring-transparent peer-checked:ring-emerald-500 dark:ring-offset-slate-800 transition"></div>
                            </label>
                            <label class="cursor-pointer">
                                <input id="colorOrange" type="radio" name="color" value="orange" class="peer sr-only">
                                <div class="w-8 h-8 rounded-full bg-orange-500 ring-2 ring-offset-2 ring-transparent peer-checked:ring-orange-500 dark:ring-offset-slate-800 transition"></div>
                            </label>
                            <label class="cursor-pointer">
                                <input id="colorPurple" type="radio" name="color" value="purple" class="peer sr-only">
                                <div class="w-8 h-8 rounded-full bg-purple-500 ring-2 ring-offset-2 ring-transparent peer-checked:ring-purple-500 dark:ring-offset-slate-800 transition"></div>
                            </label>
                            <label class="cursor-pointer">
                                <input id="colorRed" type="radio" name="color" value="red" class="peer sr-only">
                                <div class="w-8 h-8 rounded-full bg-red-500 ring-2 ring-offset-2 ring-transparent peer-checked:ring-red-500 dark:ring-offset-slate-800 transition"></div>
                            </label>
                        </div>
                        @error('color')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="bg-slate-50 dark:bg-slate-700/50 px-6 py-4 flex flex-row-reverse gap-3">
                    <button id="saveBtn" type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-indigo-500 transition">Simpan</button>
                    <button type="button" onclick="closeModal()" class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-white dark:bg-slate-700 px-6 py-2.5 text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-slate-600 hover:bg-slate-50 dark:hover:bg-slate-600 transition">Batal</button>
                    <button id="deleteBtn" type="button" class="hidden mr-auto text-sm font-bold text-red-600" onclick="confirmDelete()">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const eventsBase = "{{ url('/lainlain/kalender/event') }}";

        function openModal(dateString = null, eventId = null) {
            const modal = document.getElementById('eventModal');
            const form = document.getElementById('eventForm');
            const methodInput = document.getElementById('eventMethod');
            const titleEl = document.getElementById('eventTitle');
            const dateEl = document.getElementById('eventDate');
            const timeEl = document.getElementById('eventTime');
            const descEl = document.getElementById('eventDescription');
            const deleteBtn = document.getElementById('deleteBtn');
            const modalTitle = document.getElementById('modal-title');

            // reset
            form.reset();
            methodInput.value = '';
            deleteBtn.classList.add('hidden');
            form.action = "{{ route('events.store') }}";
            modalTitle.textContent = 'Buat Jadwal Baru';

            if (dateString) { dateEl.value = dateString; }

            if (eventId) {
                // fetch event data
                fetch(`${eventsBase}/${eventId}`)
                    .then(r => r.json())
                    .then(data => {
                        titleEl.value = data.title || '';
                        dateEl.value = data.date || '';
                        timeEl.value = data.time ? data.time.substring(0,5) : '';
                        descEl.value = data.description || '';
                        if (data.color) {
                            const colorRadio = document.querySelector(`input[name="color"][value="${data.color}"]`);
                            if (colorRadio) colorRadio.checked = true;
                        }

                        methodInput.value = 'PUT';
                        form.action = `${eventsBase}/${eventId}`;
                        deleteBtn.classList.remove('hidden');
                        modalTitle.textContent = 'Edit Jadwal';
                    })
                    .catch(err => {
                        console.error('Gagal mengambil event', err);
                    });
            }

            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('eventModal');
            modal.classList.add('hidden');
        }

        function confirmDelete() {
            if (!confirm('Hapus event ini?')) return;
            const form = document.getElementById('eventForm');
            const action = form.action;

            // create and submit a form to delete
            const f = document.createElement('form');
            f.method = 'POST';
            f.action = action;
            f.innerHTML = `@csrf\n<input type="hidden" name="_method" value="DELETE">`;
            document.body.appendChild(f);
            f.submit();
        }
    </script>
@endsection
