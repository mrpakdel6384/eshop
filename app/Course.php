<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Sluggable;
    protected $guarded = [];

    public $casts = [
        'images'=>'array',
    ];


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
        return "/courses/$this->slug";
    }

    public function setBodyAttribute($value){
        $this->attributes['description'] = str_limit(preg_replace('/<[^>]*>/', '', $value),200);
        $this->attributes['body']= $value;
    }

    public function episodes(){
        return $this->hasMany(Episode::class);
    }


}
