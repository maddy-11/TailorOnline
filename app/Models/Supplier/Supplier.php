<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Company\Company;

class Supplier extends Model
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
        'bran_name',
        'full_business_name',
        'company_id',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'address',
        'phone',
        'last_ip',
        'status',
        'logo',
        'bank_name',
        'bank_account_number',
        'contact_person',
        'contact_person_phone',
        'loan_amount_paid',
        'payment_status',
        'payment_date'
    ];


    /**
     * Dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];


    /**
     * The default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'created_by' => 1,
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // protected $with = ['owner'];
}
