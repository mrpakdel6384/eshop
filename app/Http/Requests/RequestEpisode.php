<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEpisode extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|max:250',
            'description'=>'required',
            'course_id'=>'required',
            'time'=>'required',
            'videoUrl'=>'required',
            'type'=>'required',
            'tags'=>'required',
            'number'=>'required'
        ];
    }
}
