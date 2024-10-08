<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['certificate_id', 'course_id', 'section_name'];

    /**
     * Get the course associated with the section.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the certificate associated with the section.
     */
    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    /**
     * Get the quiz associated with the section.
     */
    public function questions()
    {
        return $this->hasMany(Quiz::class);
    }
}
