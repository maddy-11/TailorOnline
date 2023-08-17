<?php

namespace App\Models;

use App\Models\Supplier\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company\Company;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanApplication extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'loan_amount', 'invoice_number', 'invoice_date', 'remarks', 'invoice', 'company_id', 'supplier_id', 'interest_rate', 'term_length',
        'delivery_order_invoice','delivery_order_date','status'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
