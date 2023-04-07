<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class excel_import_attedance extends Model
{
    use HasFactory;

    protected $fillable = [
        "attedance_date",
        "empid",
        "morning_in",
        "lunch_out",
        "lunch_in",
        "eveningout",
    ];

}
