<?php

namespace App\Models\Admission\Form;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    public function getPhotoAttribute($value='')
    {
        return asset('uploads/guardians/photo/'.$value);
    }

    public function getSignatureAttribute($value='')
    {
        return asset('uploads/guardians/signature/'.$value);
    }
}
