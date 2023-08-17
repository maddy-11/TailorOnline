<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class CreditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'credit_limit',
        'new_credit_limit',
        'created_by'
    ];
}
