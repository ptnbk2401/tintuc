<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Vadmin\Core\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Socialite;

class AuthController extends Controller
{
    public function __construct(Request $request, User $objmUser)
    {
        $this->objmUser = $objmUser;
    }
    public function getLogin(){
        if (Auth::check()) {
            return redirect()->route('vadmin.core.index.index');
        }

    	return view('auth.auth.login');
    }

    public function postLogin(Request $request){
    	$username = $request->username;
    	$password = $request->password;

    	if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $id_user = Auth::user()->id;
            $objCB = User::getCapbacUser($id_user);
            if($objCB->code == 'khachhang') {
                return redirect()->intended(route('vpublic.core.pcindex.index'));
            }
            return redirect()->intended(route('vadmin.core.index.index'));
        } else {
            $request->session()->flash('msg', 'Sai username hoặc password!');
        	return redirect()->intended(route('auth.auth.login'));
        }
    }

    public function logout(){
        Auth::logout();
        Session::forget('objUser');
        Session::forget('arCodePhongBan');
        Session::forget('arIdPhongBan');
        Session::forget('arCodeChucVu');
        Session::forget('isQuanLy');
        Session::forget('isGiamDoc');

        return redirect()->route('auth.auth.login');
    }

    // public function handleProviderCallback($provider)
    // {
    //     $user = Socialite::driver($provider)->user();

    //     $authUser = $this->findOrCreateUser($user, $provider);
    //     Auth::login($authUser, true);
    //     return redirect($this->redirectTo);
    // }

     private function findOrCreateUser($arLogin)
    {
        $authUser = User::where('username', '=', $arLogin['username'])->where('ID_fb', '=', $arLogin['ID_fb'])->first();
        if ($authUser != null) {
            return $authUser;
        }
        $this->objmUser->register($arLogin);
        $authUser = User::where('username', '=', $arLogin['username'])->where('ID_fb', '=', $arLogin['ID_fb'])->first();
        return $authUser;
    }

    public function callback($social){
        $fileName = '';
        try {
            $userLogin = Socialite::driver($social)->user();
            $arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );
            $arLogin = array();
            //upload file lần đầu đăng nhập
            if ($this->findUserByIdFb($userLogin->id) == false) {
                $linkAvatar  = $userLogin->avatar;
                if($social ==='google'){
                    $user = $userLogin->user;
                    $linkAvatar = str_replace('s50', 's150', $linkAvatar);
                }
                
                $fileName = getenv('BASE_FILE_NAME') . '-' . time() . '.png';
                file_put_contents(
                    storage_path('app/media/files/users/' . $fileName),
                    file_get_contents($linkAvatar,
                    false,
                    stream_context_create($arrContextOptions)));
                $userLogin->avatar = $fileName;
                
            }
            $arLogin['avatar'] = $fileName;
            $arLogin['ID_fb'] = $userLogin->id;
            $arLogin['username'] = $userLogin->email;
            $arLogin['first_name'] = !empty($user['name']['familyName']) ? $user['name']['familyName'] : '';
            $arLogin['last_name'] = !empty($user['name']['givenName']) ? $user['name']['givenName'] : $userLogin->name;
            $arLogin['display_name'] = !empty($user['displayName'])? $user['displayName'] : '';
            $arLogin['password'] = '';
            $arLogin['address'] = '';
            $arLogin['active'] = 1;
            $arLogin['email'] = $userLogin->email;
            $authUser = $this->findOrCreateUser($arLogin);
            Auth::login($authUser, true);
        } catch (\Exception $e) {
            return redirect()->route('vpublic.core.pcindex.index')->with( ['msgError' => 'msgError'] );
        }
        if(empty($authUser->SoDienThoai) || empty($authUser->DiaChi)) {
            return redirect()->route('vpublic.core.pcindex.index')->with( ['msgSuccessMissData' => 'msgSuccessMissData'] );
        }
        return redirect()->route('vpublic.core.pcindex.index')->with( ['msgSuccess' => 'msgSuccess'] );
    }

    private function findUserByIdFb($sid)
    {
        $authUser = User::where('ID_fb', '=', $sid)->first();
        if ($authUser) {
            return true;
        }
        return false;
    }
    public function redirectLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }
}
