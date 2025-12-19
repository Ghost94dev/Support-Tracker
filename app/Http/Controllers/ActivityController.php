<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActivityController extends Controller
{
    public function index()
    {
        // Show today's activities with their updates
        $activities = Activity::with(['updates.user'])
            ->whereDate('activity_date', today())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        Activity::create([
            'title' => $request->title,
            'description' => $request->description,
            'activity_date' => today(),
            'created_by' => Auth::id()
        ]);

        return redirect()->route('activities.index')
            ->with('success', 'Activity created');
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'status' => 'required',
            'remarks' => 'nullable|string'
        ]);

        $user = Auth::user();

        ActivityUpdate::create([
            'activity_id' => $activity->id,
            'user_id' => Auth::id(),
            'status' => $request->status,
            'remarks' => $request->remarks,
            'updated_at' => now(),
            'user_name' => $user->name,
            'user_role' => $user->role,
            'user_department' => $user->department
        ]);

        return back()->with('success', 'Activity updated');
    }


    public function report(Request $request)
{
    $updates = ActivityUpdate::with(['activity', 'user'])
        ->when($request->start_date, fn ($q) =>
            $q->whereDate('updated_at', '>=', $request->start_date)
        )
        ->when($request->end_date, fn ($q) =>
            $q->whereDate('updated_at', '<=', $request->end_date)
        )
        ->orderBy('updated_at', 'desc')
        ->get();

    return view('activities.report', compact('updates'));
}

}
