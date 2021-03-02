<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
      if ($this->isMethod('POST')) {
        return [
          'name' => 'required|unique:categories',
        ];
      } else {
        return [
          'name' => 'required|unique:categories,name,' . request()->route('tag')->id,
        ];
      }
    }
}
