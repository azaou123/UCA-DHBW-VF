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
        'image_project',
        'slug'

    ];


    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'project_partner', 'project_id', 'partner_id');
    }

}
