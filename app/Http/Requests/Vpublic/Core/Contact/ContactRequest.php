<?php

namespace App\Http\Requests\Vpublic\Core\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ContactRequest extends FormRequest
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
    public function rules(Route $route, Request $request)
    {
        return [
            'fullname'         => 'required|max:60',
            'email'            => 'required|max:60',      
            'content'          => 'required|min:100',  
        ];    
    }
    public function messages()
    {
        return [
            'fullname.required'       => 'Nhập họ tên',            
            'fullname.max'            => 'Nhập họ tên không quá :max ký tự',                
            'content.required'          => 'Nhập nội dung liên hệ',    
            'content.min'               => 'Nhập nội dung liên hệ ít nhất :min ký tự',    
            'email.required'            => 'Nhập Email',    
            'email.max'                 => 'Nhập Email không quá :max ký tự',    
            
        ];
    }
}
