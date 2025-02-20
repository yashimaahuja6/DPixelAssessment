<?php

namespace App\Livewire;

use App\Models\AllJob;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class JobCard extends Component
{
    public function render()
    {
        Log::info('Livewire JobCard component is being called!');

        $jobs = AllJob::with(['company', 'skills'])->get();

        Log::info('Jobs fetched from database:', $jobs->toArray());

        return response()->json($jobs);
    }
}
