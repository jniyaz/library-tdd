<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        // changed the path with slug title
        return '/books/' . $this->id . '-' . Str::slug($this->title);
    }

    public function setAuthorIdAttribute($author)
    {
        $this->attributes['author_id'] = (Author::firstOrCreate([
            'name' => $author
        ]))->id;
    }
}
