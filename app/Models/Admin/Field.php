<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Field extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'field_type', 'sort_order', 'status'];


    /**
     * Get the comments for the blog post.
     */
    public function fieldValues(): HasMany
    {
        return $this->hasMany(FormFieldValue::class);
    }
}
