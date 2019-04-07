<?php

namespace App\Http\Controllers\Vpublic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vpublic\Captcha\PCaptchaLoginRequest;
use App\Http\Requests\Vpublic\Core\Register\AcrIndexRequest;
use App\Http\Requests\Vpublic\Student\VsResetPasswordRequest;
use App\Http\Requests\Vpublic\User\PburIndexRequest;
use App\Mail\RegisterUser;
use App\Mail\ResetPassword;
use App\Model\Vadmin\Core\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Mail;
use Validator;

class PAuthController extends Controller
{
    public function __construct(User $objmUser)
    {
        $this->objmUser = $objmUser;
    }
    public function getLogin()
    {
        return view('vpublic.pauth.dangnhap');
    }
    public function register()
    {
        return view('vpublic.pauth.dangky');
    }
    public function profile()
    {
        if(Auth::check()){
            $objUser = Auth::user();
            return view('vpublic.core.pcprofile.index',compact('objUser'));
        } else {
            return redirect('/');
        }
    }
    public function uploadAvatar(Request $request)
    {
        if(Auth::check()){
            $objUser = Auth::user();
            $old_avatar = $objUser->avatar;
            $formData = $request->avatar;
            // return $formData;
            if (Input::hasFile('avatar')) {
                $extension = Input::file('avatar')->getClientOriginalExtension();
                $fileName = 'avatar-'.time() . '.' . $extension;
                $request->file('avatar')->move(storage_path('app/media/files/users'), $fileName);
                $objUser->avatar = $fileName;
                $objUser->save();
                if (!is_null($old_avatar) && !empty($old_avatar)) {
                    Storage::delete("media/files/users/" . $old_avatar);
                }
            }
            return "<img src='/storage/app/media/files/users/$fileName' class='img-thumbnail'>" ;
        } else {
            return 0;
        }
    }
    
    public function postProfile(Request $request)
    {
        if(Auth::check()){
            $objUser = Auth::user();
            $first_name = !empty($request->first_name) ? $request->first_name : '';
            $last_name = !empty($request->last_name) ? $request->last_name : '';
            $display_name = !empty($request->display_name) ? $request->display_name : '';
            $email = !empty($request->email) ? $request->email : '';
            $phone = !empty($request->phone) ? $request->phone : '';
            $address = !empty($request->address) ? $request->address : '';
            if(!empty($first_name)) {
                $arItem['first_name'] = $first_name;
            }
            if(!empty($last_name)) {
                $arItem['last_name'] = $last_name;
            }
            if(!empty($display_name)) {
                $arItem['display_name'] = $display_name;
            }
            if(!empty($email)) {
                $arItem['email'] = $email;
            }
            if(!empty($phone)) {
                $arItem['phone'] = $phone;
            }
            if(!empty($address)) {
                $arItem['address'] = $address;
            }
            if(DB::table('users')->where('id', Auth::id())->update($arItem)) {
                return redirect()->back()->with('msgSuccess','Update Success');
            }else {
                return redirect()->back()->with('msgError','Error');
            }
            
            
        } else {
            return redirect('/');
        }
    }
    
    public function postLogin(PCaptchaLoginRequest $request)
    {
        
        $email = trim($request->email);
        $password = trim($request->password);
        $remember = $request->rememberme;
        $objUser = $this->objmUser->checkEmailUser($email);
        if($remember == 'true') {
            $remember = true;
        } else {
            $remember = false;
        }
        $result = Auth::attempt(['email' => $email, 'password' => $password, 'Khoa' => 0], $remember);

        if ($result) {
            // check user IP
            $ip = request()->ip().'-'.php_uname('n');
            $now = date('Y-m-d H:i:s');
            $limit_time = date('Y-m-d H:i:s', strtotime($now. '-30 minutes'));
            $checkIp = $this->objmUser->where('username', '!=', $email)->where('user_ip', $ip)->where('logged_time', '>', $limit_time)->first();
            if (!is_null($checkIp)) {
                // đang login tài khoản khác.
                $notice = 'You are logged in '.$checkIp->username.'. Please log out of your account completely before logging in to another account!';
                $request->session()->flash('msgErlg', $notice);
                Auth::logout();
                return redirect('/');
            } else {
                // ok.
                $this->objmUser->where('username', $email)->update(['user_ip' => $ip, 'logged_time' => $now]);
            }

            $this->objmUser->where('username',$email)->update(['soLanKhoa' => 0]);
            return redirect()->back();
            // return redirect()->intended('/');
        } else {
            if( Auth::attempt(['email' => $email, 'password' => $password, 'Khoa' => 1], $remember)) {
                $request->session()->flash('msgErlg', 'Your account has been locked. Please contact admin for assistance.!');
                Auth::logout();
                return redirect()->back();
            } else {
                $request->session()->flash('msgErlg', 'WRONG EMAIL OR PASSWORD.');
            }
            // if( !empty($objUser) ) {
            //     $objUser->increment('soLanKhoa', 1);
            //     $soLanKhoa = $objUser->soLanKhoa;
            //     if($soLanKhoa > 2) {
            //         $request->session()->flash('manylogin', '1');
            //         if($soLanKhoa < 5) {
            //             $request->session()->flash('msgErlg', 'Có vẻ như bạn gặp sự cố khi truy cập tài khoản của mình. Để bảo mật cho bạn, chúng tôi sẽ chặn và khóa tài khoản của bạn nếu nhập sai quá 5 lần. Hãy liên hệ với admin của bạn! (Bạn đã đăng nhập sai '.$soLanKhoa.' lần) ');
            //         } else {
            //             $this->objmUser->where('username',$email)->update(['Khoa' => 1]);
            //             $request->session()->flash('msgErlg', 'Dường như bạn cố tình vào tài khoản không phải của bạn, chúng tôi đã khóa tài khoản của bạn vì lý do bảo mật. Vui lòng liên hệ admin để được trợ giúp.!');
            //         }
            //     } else {
            //         $request->session()->flash('msgErlg', 'WRONG EMAIL OR PASSWORD.');
            //     }
            // } else {
            //     $request->session()->flash('msgErlg', 'WRONG EMAIL OR PASSWORD.');
            // }
            
            return redirect()->back();
            // return redirect('/');
        }
    }

    public function postRegister(AcrIndexRequest $request)
    {
        // dd($request->all());
        $token = md5(trim($request->email)).str_random(10);
        $arItem = [
            'username' => trim($request->email),
            'email' => trim($request->email),
            'password' => bcrypt(trim($request->password)),
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'display_name' => trim($request->display_name),
            'address' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'avatar' => '',
            'Khoa' => 0,
            'active_token' => $token
        ];
        $result = DB::table('users')->insertGetId($arItem);
        if ($result) {
            // try{
            //     Mail::to($arItem['username'])->send(new RegisterUser($arItem));
            //     $request->session()->flash('msgErrgSu', 'Đăng kí thành công, vui lòng kiểm tra mail để kích hoạt tài khoản!');
            //     $request->session()->flash('userEmail', $arItem['username']);
            // } catch (\Exception $e) {
            //     $request->session()->flash('msgErrg', 'Có lỗi trong quá trình đăng kí vui lòng thực hiện lại!');
            // }
            $objUser = User::find($result);
            Auth::login($objUser, true);
            return redirect('/')->with('msgScAc', 'Sign Up Success');
            
        } else {
            $request->session()->flash('msgErrg', 'There was an error during the registration process, please try again!');
        }
        return redirect('/');
        
    }
    // public function reSendEmail($code, Request $request)
    // {
    //     $user = $this->objmUser->getUserByUsername($code);
    //     if (!is_null($user)) {
    //         $arItem = [
    //             'username' => trim($user->username),
    //             'HoTen' => trim($user->HoTen),
    //             'SoDienThoai' => trim($user->SoDienThoai),
    //             'DiaChi' => trim($user->DiaChi),
    //             'NgayDangKy' => date('Y-m-d H:i:s'),
    //             'active_token' => $user->active_token
    //         ];
    //         Mail::to($arItem['username'])->send(new RegisterUser($arItem));
    //         $request->session()->flash('msgErrgSe', 'Vui lòng kiểm tra mail để kích hoạt tài khoản!');
    //         $request->session()->flash('userEmail', $arItem['username']);
    //     }
    //     return redirect('/');
    // }

    // public function activeUser($code)
    // {
    //     $objUser = $this->objmUser->findUserByActiveToken($code);
    //     if (!is_null($objUser)) {
    //         $objUser->Khoa = 0;
    //         $objUser->active_token = '';
    //         $objUser->save();
    //         Auth::login($objUser, true);
    //         return redirect('/')->with('msgScAc', true);
    //     } else {
    //         return redirect('/')->with('msgErlg', 'Kích thoạt tài khoản không thành công, vui lòng kiểm tra lại email!');
    //     }
    // }

    public function logout()
    {
        $username = Auth::user()->username;
        $this->objmUser->where('username', $username)->update(['user_ip' => null]);
        Auth::logout();
        return redirect('/');
    }

    public function forgotPassword(Request $request)
    {
        $email = trim($request->email);
        $token = md5(trim($request->email)).str_random(10);
        $objUser = $this->objmUser->checkEmailUser($email);
        if (!is_null($objUser)) {
            $objUser->active_token = $token;
            $objUser->save();
            $arItem = [
                'token' => $token
            ];
            Mail::to($email)->send(new ResetPassword($arItem));
            $request->session()->flash('msgfg', 'Vui lòng kiểm tra email để lấy lại mật khẩu tài khoản!');
        } else {
            $request->session()->flash('msgfg', 'Tài khoản này không hoạt động trên hệ thống, Bạn vui lòng kiểm tra lại email!');
        }
        return redirect('/');
    }

    public function resetPassword($token)
    {
        return view('vpublic.pauth.reset-pass', compact('token'));
    }

    public function updatePassword(VsResetPasswordRequest $request)
    {
        $code = $request->token; 
        $objUser = $this->objmUser->findUserByActiveToken($code);
        if (!is_null($objUser)) {
            if ($objUser->username != trim($request->email)) return redirect()->route('vpublic.pauth.resetpassword', $code)->with('msgrs', 'Email không trùng khớp, vui lòng kiểm tra lại email!');
            $objUser->password = bcrypt(trim($request->password));
            $objUser->active_token = null;
            $objUser->save();
            Auth::login($objUser, true);
            return redirect('/')->with('msgrs', 'Cập nhật mật khẩu thành công!');
        } else {
            return redirect()->route('vpublic.pauth.resetpassword', $code)->with('msgrs', 'Link xác nhận không đúng,Vui lòng kiểm tra email!');
        }
    }

    //facebook
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        try {
            $arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );
            $userLogin = Socialite::driver($social)->user();
            $arLogin = array();
            //upload file lần đầu đăng nhập
            $fileName = '';
            if ($this->findUserByEmail($userLogin->email) == 0) {
               
                $link = $userLogin->avatar;
                $fileName = getenv('BASE_FILE_NAME') . '-' . time() . '.png';
                file_put_contents(storage_path('app/media/files/users/' . $fileName), file_get_contents($link, false, stream_context_create($arrContextOptions)));
                $userLogin->avatar = $fileName;
            }
            
            $arLogin['avatar'] = $fileName;
            $arLogin['username'] = $userLogin->email;
            $arLogin['email'] = $userLogin->email;
            $arLogin['last_name'] = $userLogin->name;
            $arLogin['first_name'] = '';
            $arLogin['active'] = 1;
            $arLogin['password'] = '';
            $arLogin['address'] = '';
            $authUser = $this->objmUser->loginSocial($arLogin);
            
            Auth::login($authUser, true);

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return redirect()->route('vpublic.daotao.pdindex.index');
        }
        return redirect()->route('vpublic.auth.profile');
    }
    public function findUserByEmail($email)
    {
        return DB::table('users')->where('username', $email)->count();
    }
}
