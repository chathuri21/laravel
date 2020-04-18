<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/books/' . $this->id . '-' . $this->title;
        // Str::slug($this->title)
    }
}
