<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','lesson_id','sort_order']; // Specify fillable columns
    // Define relationships or additional methods here
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

}
