<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'projectId',
        'project_name',
        'client_name',
        'techonology',
        'payment_type',
        'enddate',
        'assign_to',
        'assign_by'
    ];

    public function ManagerDetails(){
        return $this->hasOne(OtherUser::class, 'id', 'assign_to');
    }

    public function SuperAdminDetails(){
        return $this->hasMany(User::class, 'id', 'assign_by');
    }
}
