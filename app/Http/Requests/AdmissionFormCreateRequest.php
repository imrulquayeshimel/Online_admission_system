<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionFormCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Payment
            // 'payment_method'     => 'required|numeric',
            // 'transaction_number' => 'required|min:8',
            // 'txn_id'             => 'required|min:3',

            // student info
            'name'              => 'required|min:3|max:100',
            // 'date_of_birth'     => 'required|date_format:"d-m-Y"',
            // 'gender'            => 'required|numeric',
            // 'photo'             => 'required|image|mimes:jpeg,png,jpg|max:300',
            'photo'             => 'image|mimes:jpeg,png,jpg|max:300',
            // 'blood_group'       => 'required|numeric',
            // 'email'             => 'required|email',
            'contact_number'    => 'required|min:8',
            // 'present_address'   => 'required|min:10',
            // 'permanent_address' => 'required|min:10',
            // 'nationality'       => 'required|min:3',
            // 'religion'          => 'required|min:3',
            // 'signature'         => 'required|image|mimes:jpeg,png,jpg|max:300',
            'signature'         => 'image|mimes:jpeg,png,jpg|max:300',

            // educational info
            // 'ssc_board'             => 'required|min:3|max:100',
            // 'ssc_name_of_institute' => 'required|min:3|max:100',
            // 'ssc_passing_year'      => 'required|numeric|digits:4',
            // 'ssc_gpa'               => 'numeric|between:2.5,5.0',
            // 'ssc_marksheet'         => 'required|image|mimes:jpeg,png,jpg',
            'ssc_marksheet'         => 'image|mimes:jpeg,png,jpg',
            // 'hsc_board'             => 'required|min:3|max:100',
            // 'hsc_name_of_institute' => 'required|min:3|max:100',
            // 'hsc_passing_year'      => 'required|numeric|digits:4',
            // 'hsc_gpa'               => 'numeric|between:2.5,5.0',
            // 'hsc_marksheet'         => 'required|image|mimes:jpeg,png,jpg',
            'hsc_marksheet'         => 'image|mimes:jpeg,png,jpg',

            // // parents info
            // 'father_name'       => 'required|min:3|max:100',
            // 'father_occupation' => 'required|min:3|max:100',
            // 'father_contact'    => 'required|min:8',
            // 'father_photo'      => 'required|image|mimes:jpeg,png,jpg|max:300',
            'father_photo'      => 'image|mimes:jpeg,png,jpg|max:300',
            // 'mother_name'       => 'required|min:3|max:100',
            // 'mother_occupation' => 'required|min:3|max:100',
            // 'mother_contact'    => 'required|min:8',
            // 'mother_photo'      => 'required|image|mimes:jpeg,png,jpg|max:300',
            'mother_photo'      => 'image|mimes:jpeg,png,jpg|max:300',

            // // guardian info
            // 'guardian_name'           => 'required|min:3|max:100',
            // 'guardian_photo'          => 'required|image|mimes:jpeg,png,jpg|max:300',
            'guardian_photo'          => 'image|mimes:jpeg,png,jpg|max:300',
            // 'guardian_occupation'     => 'required|min:3|max:100',
            // 'guardian_salary'         => 'required|numeric',
            // 'guardian_email'          => 'required|email',
            // 'guardian_contact_number' => 'required|min:8',
            // 'relationship_of_student' => 'required|min:3|max:100',
            // 'guardian_signature'      => 'required|image|mimes:jpeg,png,jpg|max:300',
            'guardian_signature'      => 'image|mimes:jpeg,png,jpg|max:300',
        ];
    }
}
