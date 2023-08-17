<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
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

    protected $guard = 'customer';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'email_verified_at',
        'password',
        'remember_token',
        'address',
        'phone',
        'credit_limit',
        'last_ip',
        'dob',
        'avatar',
        'gender'
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

    // protected $with = ['owner'];
}
