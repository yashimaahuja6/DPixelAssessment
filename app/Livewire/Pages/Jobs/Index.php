<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\AllJob;
use Livewire\Component;

class Index extends Component
{
    public array $jobs = [];

    public function mount()
    {
        $this->jobs = AllJob::with(['company', 'skills'])->get()->toArray(); 
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
    public function deleteJob($id)
    {
        AllJob::findOrFail($id)->delete();
        $this->refreshJobs();
    }

    private function refreshJobs()
    {
        $this->jobs = AllJob::with(['company', 'skills'])->get()->toArray(); 
    }
}
