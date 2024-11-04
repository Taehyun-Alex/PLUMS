<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'course_id',
        'tags',
        'score',
        'total_score',
        'recommendation_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function answers() {
        return $this->hasMany(QuizResultAnswer::class);
    }

    public function recommended_cert() {
        return $this->belongsTo(Certificate::class, 'recommendation_id');
    }
}
