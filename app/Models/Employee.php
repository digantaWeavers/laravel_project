<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
        'lead_assign',
        'added_by'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // added by
    public function managername(){
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    // teamlead name
    public function leadname(){
        return $this->hasOne(TeamLead::class, 'id', 'lead_assign');
    }
}
