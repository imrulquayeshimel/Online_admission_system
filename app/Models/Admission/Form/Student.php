<?php

namespace App\Models\Admission\Form;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const BLOOD_GROUP = [
        '1' => 'A+',
        '2' => 'A-',
        '3' => 'AB+',
        '4' => 'AB-',
        '5' => 'B+',
        '6' => 'B-',
        '7' => 'O+',
        '8' => 'O-',
    ];

    const GENDER = [
        '1' => 'Male',
        '2' => 'Female',
    ];

    const STATUS = [
        '1' => 'APPROVED',
        '0' => 'UNAPPROVED',
    ];

    protected $fillable = ['name' ,'dob', 'gender', 'photo', 'blood_group', 'email', 'contact_number', 'present_address', 'permanent_address', 'nationality', 'religion',  'signature','reg_token','department_id','status','exam_season_id','exam_roll'];

    /**
     * Get the EducationalQualification record associated with the model.
     */
    public function educationalQualification()
    {
        return $this->hasOne(EducationalQualification::class);
    }

    /**
     * Get the Parents record associated with the model.
     */
    public function parents()
    {
        return $this->hasOne(Parents::class);
    }

    /**
     * Get the Guardian record associated with the model.
     */
    public function guardian()
    {
        return $this->hasOne(Guardian::class);
    }

    /**
     * Get the Payment record associated with the model.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getGender()
    {
        if (in_array($this->gender, array_keys(self::GENDER))) {
            return self::GENDER[$this->gender];
        }else {
            return "";
        }

    }

    public function getBloodGroup()
    {
        if (in_array($this->blood_group, array_keys(self::BLOOD_GROUP))) {
            return self::BLOOD_GROUP[$this->blood_group];
        }else {
            return "";
        }
    }

    public function getStatus()
    {
        return self::STATUS[$this->status];
    }

    /**
     * Get the Department that owns the model.
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Admin\Department');
    }

    public function examSeason()
    {
        return $this->belongsTo('App\Models\Admin\ExamSeason');
    }

    public function getPhotoAttribute($value='')
    {
        return asset('uploads/students/photo/'.$value);
    }

    public function getSignatureAttribute($value='')
    {
        return asset('uploads/students/signature/'.$value);
    }
}
