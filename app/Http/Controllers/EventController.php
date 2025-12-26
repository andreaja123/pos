<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $view = $request->get('view', 'month'); // month|week|day

        if ($view === 'week') {
            $reference = Carbon::parse($request->get('date', now()->toDateString()));

            $startCalendar = $reference->copy()->startOfWeek(Carbon::SUNDAY);
            $endCalendar = $startCalendar->copy()->endOfWeek(Carbon::SATURDAY);

            $events = Event::whereBetween('date', [$startCalendar->toDateString(), $endCalendar->toDateString()])->get()->groupBy(function ($e) {
                return $e->date->format('Y-m-d');
            });

            $days = [];
            $cursor = $startCalendar->copy();
            while ($cursor->lte($endCalendar)) {
                $key = $cursor->format('Y-m-d');
                $days[] = [
                    'date' => $key,
                    'day' => $cursor->day,
                    'inMonth' => true,
                    'events' => $events[$key] ?? collect(),
                ];
                $cursor->addDay();
            }

            $monthLabel = $startCalendar->format('D MMM') . ' - ' . $endCalendar->format('D MMM YYYY');

            $prev = $startCalendar->copy()->subWeek();
            $next = $startCalendar->copy()->addWeek();

            $contextDate = $reference->toDateString();
        } elseif ($view === 'day') {
            $reference = Carbon::parse($request->get('date', now()->toDateString()));

            $events = Event::whereDate('date', $reference->toDateString())->get()->groupBy(function ($e) {
                return $e->date->format('Y-m-d');
            });

            $key = $reference->format('Y-m-d');
            $days = [[
                'date' => $key,
                'day' => $reference->day,
                'inMonth' => true,
                'events' => $events[$key] ?? collect(),
            ]];

            $monthLabel = $reference->isoFormat('dddd, D MMMM YYYY');

            $prev = $reference->copy()->subDay();
            $next = $reference->copy()->addDay();

            $contextDate = $reference->toDateString();
        } else {
            // month view (default)
            $month = (int) $request->get('month', now()->month);
            $year = (int) $request->get('year', now()->year);

            $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            // start from Sunday to Saturday to fill weeks
            $startCalendar = $startOfMonth->copy()->startOfWeek(Carbon::SUNDAY);
            $endCalendar = $endOfMonth->copy()->endOfWeek(Carbon::SATURDAY);

            $events = Event::whereBetween('date', [$startOfMonth->toDateString(), $endOfMonth->toDateString()])->get()->groupBy(function ($e) {
                return $e->date->format('Y-m-d');
            });

            $days = [];
            $cursor = $startCalendar->copy();
            while ($cursor->lte($endCalendar)) {
                $key = $cursor->format('Y-m-d');
                $days[] = [
                    'date' => $key,
                    'day' => $cursor->day,
                    'inMonth' => $cursor->month === $month,
                    'events' => $events[$key] ?? collect(),
                ];
                $cursor->addDay();
            }

            $monthLabel = $startOfMonth->isoFormat('MMMM YYYY');

            $prev = $startOfMonth->copy()->subMonth();
            $next = $startOfMonth->copy()->addMonth();

            $contextDate = $startOfMonth->toDateString();
        }

        return view('lainlain.kalender', compact('days', 'monthLabel', 'prev', 'next', 'view', 'contextDate'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:30',
        ]);

        Event::create($validated);

        return redirect()->route('calendar.index')->with('success', 'Event dibuat.');
    }

    public function show(Event $event)
    {
        return response()->json($event);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:30',
        ]);

        $event->update($validated);

        return redirect()->route('calendar.index')->with('success', 'Event diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('calendar.index')->with('success', 'Event dihapus.');
    }
}
