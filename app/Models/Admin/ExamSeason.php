<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ExamSeason extends Model
{
    /**
     * Get the ApplicationDeadlines record associated with the model.
     */
    public function applicationDeadlines()
    {
        return $this->hasOne(ApplicationDeadlines::class);
    }
}
