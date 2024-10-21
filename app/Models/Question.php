<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'score',
        'tags'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getTags()
    {
        return explode(',', $this->tags);
    }

    public function setTags($tags)
    {
        $toSet = is_array($tags) ? implode(',', $tags) : $tags;
        $this->attributes['tags'] = trim($toSet);
    }
}
