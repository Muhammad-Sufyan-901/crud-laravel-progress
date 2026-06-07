<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['author_id', 'title', 'sysnopsis'])]
class Blog extends Model
{
    use SoftDeletes;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
