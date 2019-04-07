<?php

namespace App\Http\Controllers\Vpublic\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vpublic\Core\Comment\CommentRequest;
use App\Http\Requests\Vpublic\Core\Register\AcrIndexRequest;
use App\Model\Vadmin\Core\Article\AcaIndex;
use App\Model\Vadmin\Core\Cat\AccIndex;
use App\Model\Vadmin\Core\Comment\AccIndex as Comments;
use App\Model\Vadmin\Core\User\User;
use App\Model\Vadmin\Core\View\AcvIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SEO;
class PcBlogController extends Controller
{
    public function __construct(User $objmUser,AcaIndex $objmAcaIndex ,AccIndex $objmAccIndex,Comments $objmComments )
    {
        $this->objmUser = $objmUser;
        $this->objmAcaIndex = $objmAcaIndex;
        $this->objmAccIndex = $objmAccIndex;
        $this->objmComments = $objmComments;

    }
    public function BlogCat($codecat ,Request $request)
    {
        $CatItem = $this->objmAccIndex->getItemByCode($codecat);
        $objItems = $this->objmAcaIndex->getItemsByCodeCat($codecat);
        if(!empty($CatItem)){
            $cname = $CatItem->cname;
            $cat_id = $CatItem->cat_id;
        } else {
            $cname = 'Danh mục';
            $cat_id = 0;
        }
        if(!empty($objItems)){
            $preview_text = 'CoffeeStar delivers the news in colour spanning entertainment, travel, lifestyle, sport, business, technology, money and real estate. ';
            SEO::setTitle($cname);
            SEO::setDescription(str_limit($preview_text,150));
            SEO::opengraph()->setUrl($request->url());
            // SEO::setCanonical($request->root());
            SEO::opengraph()->addProperty('type', 'articles');
            SEO::twitter()->setSite('@ntp_bbbr');
            $tags = ['entertainment news', 'celebrity news', 'pop culture', 'photos', 'movies', 'fashion' , 'TV shows',$cname];
            
            SEO::metatags()->addKeyword($tags);
            return view('vpublic.core.pcbloglist.index',compact('objItems','cat_id','cname'));
        }
        return abort(404);;
    }
    public function BlogDetail($catcode,$slugname,$id,AcvIndex $AcvIndex,Request $request)
    {
        $objItem = $this->objmAcaIndex->getItemPL($id);
        $cat_id = $objItem->cat_id;
        $objItemLQ = $this->objmAcaIndex->getItemsLienQuan($cat_id,$id);
        // dd($objItemLQ);
        $objItemsCmtCha = $this->objmComments->getItemsByPost($id,0);
        $AcvIndex->countItem($id);
        if(!empty($objItem)){
            $preview_text = strip_tags(html_entity_decode($objItem->preview_text));
            SEO::setTitle($objItem->aname);
            SEO::setDescription(str_limit($preview_text,150));
            SEO::opengraph()->setUrl($request->url());
            SEO::opengraph()->addProperty('type', 'articles');
            SEO::twitter()->setSite('@ntp_bbbr');
             $tags = ['entertainment news', 'celebrity news', 'pop culture', 'photos', 'movies', 'fashion' , 'TV shows'];
            if (!empty($objItem->tags)){
                $tags_1 = explode(',', $objItem->tags);
                $tags = array_merge($tags_1,$tags);
            }
            SEO::metatags()->addKeyword($tags);
            $urls =  $request->root().'/storage/app/media/files/article/'.$objItem->picture;
            SEO::addImages($urls);
            return view('vpublic.core.pcblogsingle.index',compact('objItem','objItemsCmtCha','objItemLQ'));
        }
        return abort(404);;
        
    }

    public function BlogComment($article_id,CommentRequest $request)
    {
        $arItem = [
            'fullname' => trim($request->fullname),
            'email' => trim($request->email),
            'sdt' => trim($request->numberphone),
            'website' => trim($request->website),
            'content' => trim($request->content),
            'user_id' => Auth::id(),
            'article_id' => $article_id,
            'parent_id' => isset($request->parent_id)?$request->parent_id : 0 ,
        ];
        if ($this->objmComments->addItem($arItem)) {
            $request->session()->flash('msg', 'Comment Success');
        } else {
            $request->session()->flash('msg-er', 'An error occurred');
        }
        return redirect()->back();
    }
    public function DanhGiaSao(Request $request)
    {
        $star = $request->star;
        $article_id = $request->article_id;
        $arItem = [
            'star' => $star,
            'article_id' => $article_id
        ];
        if ( $this->objmAcaIndex->setStar($arItem) ) {
            $msg = 1;
        } else {
            $msg = 0;
        }
        return $msg ;
        
    }

}
