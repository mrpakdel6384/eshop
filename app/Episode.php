<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use Sluggable;
    protected $guarded = [];


    public function Course(){
        return $this->belongsTo(Course::class);
    }

    /**
     * @inheritDoc
     */
    public function sluggable(): array
    {
        // TODO: Implement sluggable() method.
        return [
            'slug'=>[
                'source'=>'title',
            ]
        ];
    }

    public function path()
    {
        return "/courses/{$this->Course->slug}/episode/{$this->slug}";
    }
}
