<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'p_id',
        'sequence'
    ];

    /**
     * Get the parent category
     */
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'p_id');
    }

    /**
     * Get the child categories
     */
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'p_id');
    }
}
