<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
          'title' => 'required|string',
          'category' => [
            'required',
            'numeric',
            Rule::in(Category::where('status', 'active')->pluck('id'))
          ],
          'tag.*' => [
            'required',
            'numeric',
            Rule::in(Tag::pluck('id'))
          ],
          'body' => 'required|string',
          'image' => 'required|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=1270,min_height=845,max_width=1290,max_height=865',
          'status' => [
            'required',
            Rule::in(['active', 'inactive'])
          ]
        ];
    }
}
