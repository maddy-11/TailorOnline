<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormFieldValue extends Model
{
    use HasFactory;
    protected $fillable = ['field_id', 'option_value', 'image', 'sort_order', 'status'];

    /**
     * Get the field  .
     */
    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }
}
