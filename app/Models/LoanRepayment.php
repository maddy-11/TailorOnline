<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class LoanRepayment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['loan_application_id','company_id','loan_amount_paid'];
}
