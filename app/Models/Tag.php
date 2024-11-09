<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function questionTags()
    {
        return $this->hasMany(QuestionTag::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, QuestionTag::class, 'tag_id', 'id', 'id', 'question_id');
    }
}
