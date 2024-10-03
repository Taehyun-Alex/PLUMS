<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['certificate_id', 'course_id', 'section_name'];

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
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
