<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'empId',
        'userrole',
        'fullname',
        'username',
        'emailaddress',
        'mobileno',
        'password',
        'added_by'
        // 'fullname',
        // 'username',
        // 'emailaddress',
        // 'alternativeemail',
        // 'mobileno',
        // 'alternativephone',
        // 'password',
        // 'address',
        // 'profilepic',
        // 'dob',
        // 'marriedstatus',
        // 'addharno',
        // 'pancardno',
        // 'passportno',
        // 'depertment',
        // 'location',
        // 'designation',
        // 'emptype',
        // 'empstatus',
        // 'source_hire',
        // 'joinning_date'	
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
