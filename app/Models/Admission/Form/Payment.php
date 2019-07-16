<?php

namespace App\Models\Admission\Form;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const PAYMENT_METHOD = [
        '1' => 'bKash',
        '2' => 'Rocket',
    ];
    protected $fillable = ['student_id','payment_method','transaction_number','txn_id'];

    public function getPaymentMethod()
    {
        if (in_array($this->payment_method, array_keys(self::PAYMENT_METHOD))) {
            return self::PAYMENT_METHOD[$this->payment_method];
        }else {
            return "";
        }
    }
}
