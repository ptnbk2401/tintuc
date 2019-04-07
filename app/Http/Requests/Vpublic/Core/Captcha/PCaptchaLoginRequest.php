<?php

namespace App\Http\Requests\Vpublic\Captcha;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
class PCaptchaLoginRequest extends FormRequest
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
      if ($request->has('captchalogin')) {
        $captcha = [ 'captchalogin' => 'captcha'];
        return   $captcha;
      } else {
        return [ 'captchalogin' => ''];
      }
      
    }

    public function messages()
    {
        return [
            'captchalogin.required' => 'Vui lòng nhập mã captcha',
            'captchalogin.captcha' => 'Mã captcha nhập không đúng',
        ];
    }
}
