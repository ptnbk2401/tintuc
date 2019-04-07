<?php

namespace App\Http\Requests\Vpublic\Core\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AcrIndexRequest extends FormRequest
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
        // $required = (strpos($route->getName(),"add")) ? "required" : "";
        $unique = (strpos($route->getName(),"add")) ? "users" : "users,id,".$this->id;
        $objOld = $request->all();
        $request->session()->flash('objOld',$objOld);
        return [
            'first_name' => "required|max:191",
            'last_name' => "required|max:150",
            'display_name' => "required|max:250",
            'email' => "required|min:5|max:150|unique:users|email",
            'password' => "required|min:5|confirmed",
            'captcha'   => 'required|captcha',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'username.required' => 'Username không được để trống',
    //         'username.min' => 'Username tối thiếu 3 ký tự',
    //         'username.unique' => 'Username này đã bị trùng',
    //         'password.required' => 'Password không được để trống',
    //         'password.confirmed' => 'Password chưa khớp',
    //         'last_name.required' => 'Nhập họ và tên',
    //         'first_name.required' => 'Nhập họ và tên',
    //         'email.required' => 'Email không được để trống',
    //         'email.email' => 'Nhập chưa đúng định dạng email',
    //         'email.unique' => 'Email này đã bị trùng',
    //         'phone.required' => 'Phone không được để trống',
    //         'address.required' => 'Address không được để trống',
    //     ];
    // }
}
