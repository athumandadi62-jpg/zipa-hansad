<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {
    // Role-based redirection from the default /dashboard
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('staff.dashboard');
    })->name('dashboard');

    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        $stats = [
            'totalMeetings' => \App\Models\Meeting::count(),
            'totalParticipants' => \App\Models\Participant::count(),
            'totalRecords' => \App\Models\Record::count(),
            'recentRecords' => \App\Models\Record::with(['primaryParticipant', 'meeting'])
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(),
            'upcomingMeetings' => \App\Models\Meeting::where('date', '>=', now())
                ->orderBy('date', 'asc')
                ->limit(5)
                ->get(),
        ];
        return view('dashboard', $stats);
    })->name('admin.dashboard');

    // Redirect /admin to /admin/dashboard
    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard');
    });

    // Staff Dashboard
    Route::get('/staff/dashboard', function () {
        $nextMeeting = \App\Models\Meeting::where('date', '>=', now()->startOfDay())
            ->orderBy('date', 'asc')
            ->first();
        return view('staff.dashboard', compact('nextMeeting'));
    })->name('staff.dashboard');

    // Administrative Portal Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('questions/{question}/download', [\App\Http\Controllers\Admin\QuestionController::class, 'download'])->name('questions.download');
        Route::get('records/{record}/download', [\App\Http\Controllers\Admin\RecordController::class, 'download'])->name('records.download');
        Route::resource('meetings', \App\Http\Controllers\Admin\MeetingController::class);
        Route::resource('participants', \App\Http\Controllers\Admin\ParticipantController::class);
        Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
        Route::resource('records', \App\Http\Controllers\Admin\RecordController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });

    // Global Search Route
    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search.index');
});
