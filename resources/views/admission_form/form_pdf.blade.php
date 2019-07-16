<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/pdf_style.css') }}">
    </head>
    <body>
        <div class="text-center">
            <img width="100px" src="{{ asset('images/logo/gb_logo.png') }}" alt="">
            <h3>Gono Bishwabidyalay</h3>
            <small>Admission Form</small> <br>
            <small>Department of application : {{ $student->department->dept }}</small><br>
            <small>Registration Token : {{ $student->reg_token }}</small>
        </div>
        <br>
        <table>
            <tr>
                <td width="400px">
                    <table class="table-padding">
                        <tr>
                            <td>Name</td>
                            <td width="1px">:</td>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td width="1px">:</td>
                            <td>{{ $student->dob }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td width="1px">:</td>
                            <td>{{ $student->getGender() }}</td>
                        </tr>
                        <tr>
                            <td>Blood group</td>
                            <td width="1px">:</td>
                            <td>{{ $student->getBloodGroup() }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td width="1px">:</td>
                            <td>{{ $student->email }}</td>
                        </tr>
                        <tr>
                            <td>Contact number</td>
                            <td width="1px">:</td>
                            <td>{{ $student->contact_number }}</td>
                        </tr>
                        <tr>
                            <td>Nationality</td>
                            <td width="1px">:</td>
                            <td>{{ $student->nationality }}</td>
                        </tr>

                        <tr>
                            <td>Religion</td>
                            <td width="1px">:</td>
                            <td>{{ $student->religion }}</td>
                        </tr>

                        <tr>
                            <td>Signature</td>
                            <td width="1px">:</td>
                            <td>
                                @if ($student->getOriginal('signature') != '')
                                    <img width="150px"  src="{{ $student->signature }}" alt="">
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="63px"></td>
                <td style="padding-left: 50px; padding-top: 10px" valign="top" align="right" style="padding-top: 0" width="40%">
                    @if ($student->getOriginal('photo') != '')
                        <img width="150px" src="{{ $student ? $student->photo : '' }}" alt="">
                    @endif
                </td>
            </tr>
        </table>
        <br>
        <table class="">
            <tr>
                <td style="border:0 !important; padding-bottom: 2px"> <b>Address</b> </td>
            </tr>
            <tr>
                <td style="border:0 !important">
                    <table class="no-border">
                        <tr>
                            <td width="150px">Present address</td>
                            <td width="1px">:</td>
                            <td>{{ $student->present_address }}</td>
                        </tr>
                        <tr>
                            <td width="150px">Permanent address</td>
                            <td width="1px">:</td>
                            <td>{{ $student->permanent_address }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table class="">
            <tr>
                <td colspan="2" style="padding-bottom: 2px"> <b>Guardian</b> </td>
            </tr>
            <tr>
                <td width="500px" style="border:0 !important; padding-bottom: 2px">
                    <table class="no-border">
                        <tr>
                            <td width="150px" >Name</td>
                            <td width="15px">:</td>
                            <td >{{ $student->guardian ? $student->guardian->name : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Occupation</td>
                            <td width="15px">:</td>
                            <td >{{ $student->guardian ? $student->guardian->occupation : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Salary</td>
                            <td width="15px">:</td>
                            <td >{{ $student->guardian ? $student->guardian->salary : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Email</td>
                            <td width="15px">:</td>
                            <td >{{ $student->guardian ? $student->guardian->email : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Contact Number</td>
                            <td width="15px">:</td>
                            <td >{{ $student->guardian ? $student->guardian->contact_number : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Relationship</td>
                            <td width="15px">:</td>
                            <td >{{ $student->guardian ? $student->guardian->relationship_of_student : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Signature</td>
                            <td width="15px">:</td>
                            <td >
                                @if ($student->guardian->getOriginal('signature') != '')
                                    <img width="150px" src="{{ $student->guardian ? $student->guardian->signature : '' }}" alt="">
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="30%" align="right">
                    <div>
                        @if ($student->guardian->getOriginal('photo') != '')
                            <img width="150px" src="{{ $student->guardian ? $student->guardian->photo : '' }}" alt="">
                        @endif
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table class="">
            <tr>
                <td colspan="2" style="padding-bottom: 2px"> <b>Parents</b> </td>
            </tr>
            <tr>
                <td width="400px" style="border:0 !important; padding-bottom: 2px">
                    <table class="no-border">
                        <tr>
                            <td width="150px" >Father Name</td>
                            <td width="15px">:</td>
                            <td >{{ $student->parents ? $student->parents->father_name : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Father Occupation</td>
                            <td width="15px">:</td>
                            <td >{{ $student->parents ? $student->parents->father_occupation : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Father Contact</td>
                            <td width="15px">:</td>
                            <td >{{ $student->parents ? $student->parents->father_contact : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Mother Name</td>
                            <td width="15px">:</td>
                            <td >{{ $student->parents ? $student->parents->mother_name : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Mother Occupation</td>
                            <td width="15px">:</td>
                            <td >{{ $student->parents ? $student->parents->mother_occupation : '' }}</td>
                        </tr>
                        <tr>
                            <td width="150px" >Mother Contact</td>
                            <td width="15px">:</td>
                            <td >{{ $student->parents ? $student->parents->mother_contact : '' }}</td>
                        </tr>
                    </table>
                </td>
                <td width="30%" align="right">
                    <table>
                        <tr>
                            <td>
                                @if ($student->parents->getOriginal('father_photo') != '')
                                    <img width="150px" src="{{ $student->parents ? $student->parents->father_photo : '' }}" alt="">
                                @endif
                            </td>
                            <td>
                                @if ($student->parents->getOriginal('mother_photo') != '')
                                    <img width="150px" src="{{ $student->parents ? $student->parents->mother_photo : '' }}" alt="">
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table class="table">
            <tr style="padding-left:0 !important">
                <td style="padding-left:0 !important; padding-bottom: 2px"> <b>Educational Qualification</b> </td>
            </tr>
            <tr>
                <td style="padding-left:0 !important; padding-bottom: 2px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th valign="top" width="" style="border:1px solid black; padding: 3px 3px 3px 15px" >Examination</th>
                                <th valign="top" width="" style="border:1px solid black; padding: 3px 3px 3px 15px" >Board</th>
                                <th valign="top" width="" style="border:1px solid black; padding: 3px 3px 3px 15px" >Institute</th>
                                <th valign="top" width="" style="border:1px solid black; padding: 3px 3px 3px 15px" >Passing Year</th>
                                <th valign="top" width="110px" style="border:1px solid black; padding: 3px 3px 3px 15px" >GPA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">SSC</td>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">{{ $student->educationalQualification ? $student->educationalQualification->ssc_board : '' }}</td>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">{{ $student->educationalQualification ? $student->educationalQualification->ssc_name_of_institute : '' }}</td>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">{{ $student->educationalQualification ? $student->educationalQualification->ssc_passing_year : '' }}</td>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">{{ $student->educationalQualification ? $student->educationalQualification->ssc_gpa : '' }}</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">HSC</td>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">{{ $student->educationalQualification ? $student->educationalQualification->hsc_board : '' }}</td>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">{{ $student->educationalQualification ? $student->educationalQualification->hsc_name_of_institute : '' }}</td>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">{{ $student->educationalQualification ? $student->educationalQualification->hsc_passing_year : '' }}</td>
                                <td style="border:1px solid black; padding: 3px 3px 3px 15px">{{ $student->educationalQualification ? $student->educationalQualification->hsc_gpa : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <br>
        @if ($student->payment)
            <table class="">
                <tr>
                    <td style="padding-bottom: 2px"> <b>Payment</b> </td>
                </tr>
                <tr>
                    <td width="400px" style="border:0 !important; padding-bottom: 2px">
                        <table class="no-border">
                            <tr>
                                <td width="150px" >Payment Method</td>
                                <td width="15px">:</td>
                                <td >{{ $student->payment ? $student->payment->getPaymentMethod() : '' }}</td>
                            </tr>
                            <tr>
                                <td width="150px" >Transaction Number</td>
                                <td width="15px">:</td>
                                <td >{{ $student->payment ? $student->payment->transaction_number : '' }}</td>
                            </tr>
                            <tr>
                                <td width="150px" >TXN ID</td>
                                <td width="15px">:</td>
                                <td >{{ $student->payment ? $student->payment->txn_id : '' }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        @endif
    </body>
</html>
