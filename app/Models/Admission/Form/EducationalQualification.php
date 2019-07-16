<?php

namespace App\Models\Admission\Form;

use Illuminate\Database\Eloquent\Model;

class EducationalQualification extends Model
{
    protected $fillable = ['student_id', 'ssc_board', 'ssc_name_of_institute', 'ssc_passing_year', 'ssc_gpa', 'ssc_marksheet', 'hsc_board', 'hsc_name_of_institute', 'hsc_passing_year', 'hsc_gpa', 'hsc_marksheet'];

    public function getSscMarksheetAttribute($value='')
    {
        return asset('uploads/marksheets/ssc/'.$value);
    }

    public function getHscMarksheetAttribute($value='')
    {
        return asset('uploads/marksheets/hsc/'.$value);
    }
}
