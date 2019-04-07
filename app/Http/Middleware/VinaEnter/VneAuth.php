<?php

namespace App\Http\Middleware\VinaEnter;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VneAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $objUser = Auth::user();
        $uid = $objUser->id;
        $username = $objUser->username;
        $arCodeGroup = array();

        //lấy và kiểm tra các phòng ban của user
        $objGroups = DB::table('core_user_group as ug')
        ->join('core_groups as g', 'ug.group_id', '=', 'g.group_id')
            ->where('ug.user_id', $uid)
            ->get();

        $is_superadmin = $is_admin = $is_member = false;
        // dd($objGroups);
        if($objGroups->isEmpty()) {

            return redirect()->route('vpublic.core.pcindex.index');
        }

        foreach ($objGroups as $key => $objGroup) {
            $gcode = $objGroup->code;
            if ($gcode == 'superadmin') {
                $is_superadmin = true;
                break;
            }
        }
        //lấy các quyền từ route
        $arRoleTmp = explode('|', $role);
        $checkGroup = false;
        if ((count($arRoleTmp) > 0) && (!$is_superadmin)) { //có check quyền
            foreach ($objGroups as $key => $objGroup) {
                $gcode = $objGroup->code;
                if (strpos($role, $gcode) !== false) {
                    $checkGroup = true;
                    break;
                }
            }

            if ($checkGroup) {
                //do some thing
            } else {
                if($is_superadmin == false &&
                    $is_admin == false &&
                    $is_gdvcongtien ==  false  &&
                    $is_gdvtaikhoan == false &&
                    $is_member == false && Auth::check()) {
                    return redirect()->route('vpublic.core.pcindex.index');
                } else {
                    return redirect()->route('vadmin.core.index.index', ['msg' => 'Bạn chưa có quyền truy cập vào tài nguyên này']);
                }
            }
        }
        return $next($request);
    }
}
