<?php
  
namespace App\Models\Admin;
  
use Illuminate\Database\Eloquent\Model;
   
class Service extends Model
{
    protected $fillable = [
        'name', 'sort_order','status'
    ];
}