<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'projectId',
        'project_name',
        'client_name',
        'techonology',
        'payment_type',
        'enddate',
        'add_by'
    ];
}
