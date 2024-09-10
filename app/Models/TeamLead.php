<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'empId',
        'fullname',
        'username',
        'emailaddress',
        'alternativeemail',
        'mobileno',
        'alternativephone',
        'password',
        'address',
        'profilepic',
        'dob',
        'marriedstatus',
        'addharno',
        'pancardno',
        'passportno',
        'depertment',
        'experience',
        'location',
        'designation',
        'emptype',
        'empstatus',
        'source_hire',
        'joinning_date',
        'added_by'
    ];
}
