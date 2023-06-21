<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['category_id', 'filterable', 'name', 'slug'];

    protected $casts = [
        'filterable' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function goods(): BelongsToMany
    {
        return $this->belongsToMany(Good::class)->withPivot('value');
    }
}
