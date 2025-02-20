<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\Skill;
use App\Models\AllJob;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title, $description, $salary, $experience, $location, $extra_info;
    public $company_name, $company_logo;
    public $selectedSkills = [];

    public function saveJob()
    {
        $this->validate([
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'salary' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',
            'company_name' => 'required|string|min:3',
            'company_logo' => 'nullable|image|max:1024', // Max 1MB
            'selectedSkills' => 'required|array|min:1',
        ]);

        // Save company
        $company = Company::firstOrCreate(
            ['name' => $this->company_name],
            ['logo' => $this->company_logo ? $this->company_logo->store('logos', 'public') : null]
        );

        // Save job
        $job = AllJob::create([
            'title' => $this->title,
            'description' => $this->description,
            'salary' => $this->salary,
            'experience' => $this->experience,
            'location' => $this->location,
            'extra_info' => $this->extra_info,
            'company_id' => $company->id,
        ]);

        // Attach skills
        $job->skills()->sync($this->selectedSkills);

        // Reset form
        $this->reset();

        session()->flash('message', 'Job posted successfully!');
    }

    public function render()
    {
        return view('livewire.pages.jobs.create', [
            'skills' => Skill::all(),
        ]);
    }
}
