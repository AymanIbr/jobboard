<?php

namespace App\Models;

use App\Models\Job\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id', 'id');
    }

    protected $appends = ['status'];
    //Append attribute
    // public function get_____Attribute(){}
    public function getStatusAttribute()
    {
        return $this->active ? 'Active' : 'Disabled';
    }
}
