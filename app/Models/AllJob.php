<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AllJob extends Model
{
    use HasFactory;

    protected $table = 'all_jobs';

    protected $fillable = ['title', 'description', 'salary', 'experience', 'location', 'extra_info', 'company_id'];

    protected $casts = [
        'extra_info' => 'array', // Ensure extra_info is always treated as an array
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'all_job_skill', 'all_job_id', 'skill_id'); 
    }
}
