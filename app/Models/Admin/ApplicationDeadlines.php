<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ApplicationDeadlines extends Model
{
    const ACCOMPLISHED = true;
    const UNACCOMPLISHED = false;

    const PUBLISHED = true;
    const UNPUBLISHED = false;

    /**
     * Get the ExamSeason that owns the model.
     */
    public function examSeason()
    {
        return $this->belongsTo(ExamSeason::class);
    }

    public function getDeadlineAttribute($value='')
    {
        return date('d-m-Y',strtotime($value));
    }
}
