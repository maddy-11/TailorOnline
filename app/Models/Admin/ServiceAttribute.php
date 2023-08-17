<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ServiceAttribute extends Model
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
    protected $fillable = ['calor_bane', 'daman', 'gala','half_loozing','service_id', 'user_id', 'silayi', 'shirt_length', 'bazo', 'tera', 'gala', 'gol_bazo','kuf', 'gera', 'pati','damn', 'chati', 'pocket', 'patti', 'options'];

    /**
     * The table associated with the model. 
     *
     * @var string
     */
    protected $table = 'serviceattributes';

    public function orders()
    {
        return $this->hasMany('App\Model\Order\Admin');
    } 

    public function service()
    {
        return $this->belongsTo('App\Model\Service\Admin');
    }
}
