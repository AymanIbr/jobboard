<?php

namespace App\Models\Job;

use App\Models\Application;
use App\Models\Category;
use App\Models\JobSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $guarded = [];

    // protected $fillable = [
    //     'id',
    //     'job_title',
    //     'job_region',
    //     'company',
    //     'job_type',
    //     'vacancy',
    //     'experience',
    //     'salary',
    //     'gender',
    //     'application_deadline',
    //     'jobdescription',
    //     'responsibilities',
    //     'education_experience',
    //     'other_benifits',
    //     'image'
    // ];

    public $timestamps = true;  //Defualt


    public function getStatusAttribute()
    {
        return $this->job_type === 'Part Time' ? 'Part time' : 'Full time';
    }

    public function getGenderAttribute()
    {
        return $this->attributes['gender'] == 'M' ? 'Male' : 'Female';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function saveJobs()
    {
        return $this->hasMany(JobSaved::class, 'job_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
