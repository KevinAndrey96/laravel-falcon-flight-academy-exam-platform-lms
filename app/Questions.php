<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'title',
        'area',
        'question',
        'answer',
        'optionA',
        'optionB',
        'optionC',
        'optionD',
        'optionE',
    ];

    /**
     * Scope a query to only include questions for a specific questionnaire.
     */
    public function scopeByTitle($query, $title)
    {
        return $query->where('title', $title);
    }

    /**
     * Scope a query to only include questions for a specific aeronautical area.
     */
    public function scopeByArea($query, $area)
    {
        return $query->where('area', $area);
    }

    /**
     * Return available options as a keyed associative array.
     */
    public function getOptionsMapAttribute()
    {
        $options = [];
        foreach (['A', 'B', 'C', 'D', 'E'] as $letter) {
            $prop = 'option' . $letter;
            if (!empty($this->$prop)) {
                $options[$letter] = $this->$prop;
            }
        }
        return $options;
    }
}
