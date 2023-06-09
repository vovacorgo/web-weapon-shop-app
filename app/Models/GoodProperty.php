<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GoodProperty extends Model
{
    use CrudTrait;
    protected $table = 'good_property';

    protected $fillable = ['property_id', 'good_id', 'value'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function good(): BelongsTo
    {
        return $this->belongsTo(Good::class);
    }
}
