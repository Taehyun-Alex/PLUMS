<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'score',
        'tags',
        'course_id',
        'certificate_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // as of right now, we don't have multiple choice questions, so this will do
    public function correctAnswer()
    {
        return $this->hasOne(Answer::class)->where('correct', true);
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

    public function scopeWhereHasTag(Builder $query, $tagsArr) {
        $connection = config('database.default');

        if ($connection === 'mysql') {
            foreach ($tagsArr as $tag) {
                $query->orWhereRaw('FIND_IN_SET(?, tags)', [$tag]);
            }
        } else {
            foreach ($tagsArr as $tag) {
                $query->orWhere('tags', 'LIKE', "%{$tag}%");
            }
        }
    }
}
