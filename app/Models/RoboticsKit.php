<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoboticsKit extends Model
{
    protected $fillable = ['name', 'description', 'brand'];

    /**
     * A robotics kit has many courses.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'kit_id');
    }
}
