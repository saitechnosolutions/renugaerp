<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        "leadid",
        "leadentrydate",
        "customername",
        "mobilenumber",
        "email",
        "address",
        "dealname",
        "dealvalue",
        "type",
        "callstage",
        "leadsource",
        "leadstatus",
    ];
}
