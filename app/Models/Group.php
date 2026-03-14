<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'level'];

    /**
     * A group has many users (students).
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * A group belongs to many courses (pivot: course_group).
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_group');
    }
}
