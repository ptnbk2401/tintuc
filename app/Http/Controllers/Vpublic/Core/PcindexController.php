<?php

namespace App\Http\Controllers\Vpublic\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vpublic\Core\Contact\ContactRequest;
use App\Http\Requests\Vpublic\Core\Register\AcrIndexRequest;
use App\Model\Vadmin\Core\Contact\AccIndex;
use App\Model\Vadmin\Core\PCat\AcpcIndex;
use App\Model\Vadmin\Core\Product\AcpIndex;
use App\Model\Vadmin\Core\Search\AcsIndex;
use App\Model\Vadmin\Core\User\User;
use Illuminate\Http\Request;
use SEO;

class PcindexController extends Controller
{
    public function __construct(User $objmUser,AcpcIndex $objmAcpcIndex, AcpIndex $objmAcpIndex, AccIndex $objmAccIndex )
    {
        $this->objmUser = $objmUser;
        $this->objmAcpIndex = $objmAcpIndex;
        $this->objmAcpcIndex = $objmAcpcIndex;
        $this->objmAccIndex = $objmAccIndex;

    }

    public function index(Request $request)
    {
        $preview_text = 'CoffeeStar delivers the news in colour spanning entertainment, travel, lifestyle, sport, business, technology, money and real estate. ';
        SEO::setTitle('Home');
        SEO::setDescription(str_limit($preview_text,150));
        SEO::opengraph()->setUrl($request->url());
        // SEO::setCanonical($request->root());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@ntp_bbbr');
        $tags = ['entertainment news', 'celebrity news', 'pop culture', 'photos', 'movies', 'fashion' , 'TV shows'];
        
        SEO::metatags()->addKeyword($tags);
        return view('vpublic.core.pcindex.index');
    }

    public function contact()
    {
        return view('vpublic.core.pccontact.index');
    }
    public function postContact(ContactRequest $request)
    {
        // dd($request->all());
        $fullname = trim($request->fullname);
        $email = trim($request->email);
        // $phone = trim($request->phonenumber);
        $content = trim($request->content);
        $arItem = [
            'fullname' => $fullname,
            'email' => $email,
            // 'phone' => $phone,
            'content' => $content,
        ];
        if ($this->objmAccIndex->addItem($arItem)) {
            $request->session()->flash('msg', 'Gửi thành công');
        } else {
            $request->session()->flash('msg-er', 'Lỗi khi Gửi liên hệ');
            return redirect()->back();
        }
        return redirect()->route('vpublic.core.pccontact.index');
    }
    public function shoppingcart()
    {
        return view('vpublic.core.pcshcart.index');
    }
    public function checkout()
    {
        return view('vpublic.core.pccheckout.index');
    }
    public function bloglist()
    {
        return view('vpublic.core.pcbloglist.index');
    }
    public function getLogin()
    {
        return view('vpublic.core.pclogin.index');
    }
    public function postRegister(AcrIndexRequest $request)
    {
        $middle_name = empty(trim($request->middle_name))? trim($request->middle_name) : '' ;
        $arItem = [
            'username' => trim($request->username),
            'password' => bcrypt(trim($request->password)),
            'first_name' => trim($request->first_name),
            'last_name' => $middle_name.' '.trim($request->last_name),
            'phone' => trim($request->phone),
            'address' => trim($request->address),
            'avatar' => ' ',
            'vgroup' => [getenv('ID_GR_KHACHHANG')],
            'email' => trim($request->email),
        ];
        // dd($arItem);
        //xử lý up hình
        // if ($request->hasFile('avatar')) {
        //     if ($request->file('avatar')->isValid()) {
        //         $path = $request->avatar->store('media/files/users');
        //         $tmp = explode('/', $path);
        //         $fileName = end($tmp);
        //         $arItem['avatar'] = $fileName;
        //     }
        // }
        $resultId = $this->objmUser->addItem($arItem);
        if ($resultId > 0) {
            $request->session()->flash('msg', 'Đăng Ký Thành Công');
        } else {
            $request->session()->flash('msg', 'Lỗi khi thêm');
            // dd($arItem);
            return redirect()->back();
        }
        return redirect()->route('vpublic.core.pclogin.index');
        
    }

    public function searchItem(AcsIndex $objmAcsIndex,Request $request){
        // dd($request->all());
        $content = $request->c;
        $objItems = $objmAcsIndex->search($content);
        $cat_id = 0;
        $cname = 'SEARCH RESULTS: '.$content;
        if(!empty($objItems)){
            return view('vpublic.core.pcbloglist.index',compact('objItems','cname'));
        }
        return abort(404);
    }
}
