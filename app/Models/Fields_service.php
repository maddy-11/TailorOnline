<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fields_service extends Model
{
    use HasFactory;
    protected $fillable = [
        'field_id',
        'services_id',
    ];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
