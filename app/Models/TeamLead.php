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
        'manager_assign',
        'added_by'
    ];

    // added by
    public function managername(){
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    // manager assigned
    public function managerassigned(){
        return $this->hasOne(OtherUser::class, 'id', 'manager_assign');
    }
}
