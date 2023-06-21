<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class GoodTag extends Model
{
    use CrudTrait;
    protected $table = 'good_tag';

    protected $fillable = ['good_id', 'tag_id'];
}
