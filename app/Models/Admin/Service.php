<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Service extends Model
{

    protected $fillable = [
        'name', 'sort_order', 'status'
    ];
    /**
     * Get the fields for the services.
     */
    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class);
    }
}
