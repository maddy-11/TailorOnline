<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FormField extends Model
{

    protected $fillable = ['service_id', 'field_id', 'sort_order', 'required'];

    /**
     * Get the fields for the services.
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
    
}
