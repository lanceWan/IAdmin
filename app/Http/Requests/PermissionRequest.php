<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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
            'name' => 'required',
            'slug' => 'required|unique:permissions,slug,'.$this->id,
            'description' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'  => trans('validation.required'),
            'unique'    => trans('validation.unique'),
        ];
    }

    public function attributes()
    {
        return [
            'name'          => trans('labels.permission.name'),
            'slug'          => trans('labels.permission.slug'),
            'description'   => trans('labels.permission.description'),
            'status'        => trans('labels.permission.status'),     
        ];
    }
}
