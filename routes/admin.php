<?php

use Inertia\Inertia;
use App\Models\AllJob;
use App\Livewire\Pages\Dashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Livewire\Pages\Jobs\{Index,Create};
use App\Http\Controllers\Admin\DashboardController;
use App\Livewire\Pages\Skills\{Index as SkillsIndex};

Route::redirect('/', '/admin/dashboard');

// Dashboard
Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::get('/api/jobs', function () {
    Log::info('Fetching jobs from API route.');

    $jobs = AllJob::with(['company', 'skills'])->get();

    Log::info('Jobs fetched:', $jobs->toArray());

    return response()->json($jobs);
});


// Skills
Route::get('/skills', SkillsIndex::class)->name('skills.index');

// Jobs
Route::get('/jobs', Index::class)->name('jobs.index');
Route::get('/jobs/create', Create::class)->name('jobs.create');

