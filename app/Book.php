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

    public function setAuthorIdAttribute($author)
    {
        $this->attributes['author_id'] = (Author::firstOrCreate([
            'name' => $author,
        ]))->id;
    }
}
