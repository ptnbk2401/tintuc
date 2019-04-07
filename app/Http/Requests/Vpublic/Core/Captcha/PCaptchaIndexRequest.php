<?php

namespace App\Http\Requests\Vpublic\Captcha;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
class PCaptchaIndexRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $sotiennap =  str_replace(",","", $request->sotiennap);
        $validSotiennap = "";
        if($sotiennap < 10000) {
            $validSotiennap = "|min:10000";
        }
        return [
            'sotiennap' => "required".$validSotiennap,
            'tenkhachhang' => "required",
            'email' => 'required|email',
           /* 'phone' => "required|digits_between:10,12",
            'quocgia' => "required",
            'tinh' => "required",
            'diachi' => "required",*/
            'noidung' => "required",
            'captcha' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'sotiennap.required' => 'Vui lòng nhập số tiền',
            'sotiennap.min' => 'Vui lòng nhập số tiền ít nhất 10,000 VNĐ',
            'tenkhachhang.required' => 'Tên khách hàng không được rỗng',
           /* 'quocgia.required' => 'Quốc gia không được để rỗng',
            'tinh.required' => 'Tỉnh không được để rỗng',
            'diachi.required' => 'Địa chỉ không được để rỗng',*/
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Nhập không đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
          /*  'phone.required' => 'Số điện thoại không được để rỗng',
            'phone.digits_between' => 'Số điện thoại không đúng',*/
            'noidung.required' => 'Vui lòng nhập nội dung',
            'captcha.required' => 'Vui lòng nhập mã captcha',
            'captcha.captcha' => 'Mã captcha nhập không đúng',
        ];
    }
}
