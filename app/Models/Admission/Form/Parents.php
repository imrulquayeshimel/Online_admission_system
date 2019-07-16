<?php

namespace App\Models\Admission\Form;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $fillable = ['student_id', 'father_name', 'father_occupation', 'father_contact', 'father_photo', 'mother_name', 'mother_occupation', 'mother_contact', 'mother_photo'];

    public function getFatherPhotoAttribute($value='')
    {
        return asset('uploads/parents/father/'.$value);
    }

    public function getMotherPhotoAttribute($value='')
    {
        return asset('uploads/parents/mother/'.$value);
    }
}
