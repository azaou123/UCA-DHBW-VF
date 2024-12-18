<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'Objective',
        'duration_in_months',
        'image_project',
        'project_details',
        'slug',
        'created_at',
    ];


    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'project_teacher');
    }
    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'project_partner');
    }
}
