<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'parent_id', 'course_id', 'sort_order']; // Specify fillable columns

    // Define relationships or additional methods here

    public function children()
    {
        return $this->hasMany(Lesson::class, 'parent_id', 'id');
    }

    public function parentLesson()
    {
        return $this->belongsTo(Lesson::class, 'parent_id');
    }


    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
