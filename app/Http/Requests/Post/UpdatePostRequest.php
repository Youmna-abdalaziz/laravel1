<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'user_id' => 'exists:users,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The Title can not be empty',
            'title.min' => 'The Updated Title must be at least 3 characters',
            'description.required' => 'The description can not be empty',
            'description.min' => 'The Updated description must be at least 10 characters',
            'user_id.exists'=>'This Id is not Exists please enter valid id'
        ];
    }
}
