<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *Same as in migration table and in form
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'delivery_date', 'total_amount','discount', 'paid_amount', 'service_attribute_id', 'user_id','quantity','sub_total_amount', 'details', 'remaining_amount','record_status'];
    protected $table= 'customer_order';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
