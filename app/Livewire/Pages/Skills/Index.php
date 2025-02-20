<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skill;

class Index extends Component
{
    public $name;
    public $skills;
    public $editingMode = false;
    public $editingSkillId;

    public function mount()
    {
        $this->skills = Skill::all(); // Load skills from DB
    }

    public function addSkill()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        Skill::create(['name' => $this->name]);

        $this->refreshSkills();
        $this->name = ''; // Clear input
    }

    public function editSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $this->name = $skill->name;
        $this->editingSkillId = $id;
        $this->editingMode = true;
    }

    public function updateSkill()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        $skill = Skill::findOrFail($this->editingSkillId);
        $skill->update(['name' => $this->name]);

        $this->refreshSkills();
        $this->resetInput();
    }

    public function deleteSkill($id)
    {
        Skill::findOrFail($id)->delete();
        $this->refreshSkills();
    }

    private function refreshSkills()
    {
        $this->skills = Skill::all();
    }

    private function resetInput()
    {
        $this->name = '';
        $this->editingSkillId = null;
        $this->editingMode = false;
    }

    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
