<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','course_id','sort_order']; // Specify fillable columns
    // Define relationships or additional methods here
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
