<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use Sluggable;

    protected $guarded = [];
    public function path(){
        return "/article/$this->slug";
    }
    public function sluggable(): array
    {


        return [
            'slug'=>[
                'source'=>'title',
            ]
        ];
    }
}
