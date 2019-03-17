<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        //dd(request('user'));
        return [
            'title' => 'required|min:3|unique:posts,title',
            'description' => 'required|min:10',
            'user_id' => 'exists:users,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The Title Is Required Please Fill It',
            'title.min' => 'The Title must be at least 3 characters',
            'title.unique' => 'Title must be Unique',
            'description.required' => 'The description is Required',
            'description.min' => 'The description must be at least 10 characters',
            'user_id.exists'=>'This Id is not Exists please enter valid id'
        ];
    }
}
