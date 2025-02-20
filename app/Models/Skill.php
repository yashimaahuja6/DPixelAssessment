<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills'; 

    protected $fillable = ['name'];

    public function jobs()
    {
        return $this->belongsToMany(AllJob::class, 'all_job_skill', 'skill_id', 'all_job_id');
    }
}
