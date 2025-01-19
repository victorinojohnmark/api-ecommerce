<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {


        return [
            'name' => ['required', 'string', 'max:255', 'unique:shops,name,'.$this->id.',id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:shops,email,'.$this->id.',id'],
            'phone_no' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            // 'tags' => ['required', 'array'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('shop')->id,
        ]);
    }
}
