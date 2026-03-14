<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_key', 'title', 'cover', 'content', 'didactic_material', 'kit_id',
    ];

    /**
     * A course belongs to one robotics kit.
     */
    public function roboticsKit()
    {
        return $this->belongsTo(RoboticsKit::class, 'kit_id');
    }

    /**
     * A course belongs to many groups (pivot: course_group).
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'course_group');
    }
}
