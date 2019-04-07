<?php

namespace App\Model\Vadmin\Core\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AcaIndex extends Model
{
    protected $table = "vne_article";
    protected $primaryKey = "article_id";
    public    $timestamps = true;

    public function tabs()
    {
        return $this->hasOne('App\Model\Vadmin\Core\ArticleTabs\AcaIndex');
    }
    public function getItems() {
        return DB::table('vne_article as a')
            ->join('vne_cat as c', 'c.cat_id','a.cat_id')
            ->leftJoin('article_tabs as t', 't.article_id', 'a.article_id')
            ->select('a.*', 'c.cname','c.code as ccode','t.tags')
            ->orderBy('a.article_id', 'DESC')
            ->paginate(30);
    }
    public function getItemsNone() {
        return DB::table('vne_article as a')
            ->join('vne_cat as c', 'c.cat_id', '=', 'a.cat_id')
            ->select('a.*', 'c.cname', 'c.code as ccode')
            ->where('a.status',0)
            ->orWhere('a.active',0)
            ->orderBy('a.status', 'ASC')
            ->orderBy('a.active', 'ASC')
            ->orderBy('a.article_id', 'DESC')
            ->paginate(30);
    }
    public function getItemsPL() {
        return DB::table('vne_article as a')
            ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
            ->join('vne_cat as c', 'c.cat_id', '=', 'a.cat_id')
            ->select('a.*', 'c.cname','cv.view')
            ->where('a.active', '=', 1)
            ->orderBy('a.article_id', 'DESC')
            ->paginate(10);
    }
    public function getItemsPLByCat($cat_id,$limit) {
        $arCat = [];
        $arID = DB::table('vne_cat')
            ->select('cat_id')
            ->where('cat_id',$cat_id)
            ->orWhere('parent_id',$cat_id)
            ->get();
        foreach ($arID as $value) {
            $arCat[]= $value->cat_id;
        }
        return DB::table('vne_article as a')
        ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
        ->join('vne_cat as c','c.cat_id','a.cat_id')
        ->join('users as u','u.id','a.user_id')
        ->select('a.aname','a.code','a.created_at','a.picture','a.article_id','a.preview_text','a.star_num','c.cname','c.code as ccode','u.username','cv.view')
        ->whereIn('a.cat_id', $arCat)
        ->where('a.active', '=', 1)
        ->orderBy('a.article_id', 'DESC')
        ->take($limit)
        ->get();
    }
    public function getItemsPLHasVideo($limit) {
        return DB::table('vne_article as a')
        ->join('vne_cat as c','c.cat_id','a.cat_id')
        ->join('users as u','u.id','a.user_id')
        ->select('a.aname','a.code','a.picture','a.article_id','a.ID_video','a.star_num')
        ->where('a.active', '=', 1)
        ->where('a.has_video', '=', 1)
        ->orderBy('a.article_id', 'DESC')
        ->take($limit)
        ->get();
    }

    public function addItem($arItem){
        return DB::table('vne_article')->insert($arItem);
    }

    public function getItem($id){
        return $this->findOrFail($id);
    }

    public function editItem($id, $arItem){
        try {
            DB::table('vne_article')
                ->where('article_id', $id)
                ->update($arItem);
        } catch(\Exception $e) {
            return false;
        }
        return true;
    }

    public function updateStatus($id){
        $objItem = $this->findOrFail($id);
        if ($objItem->active == 1) {
            $objItem->active = 0;
            $objItem->save();
            return 1;
        } else {
            $objItem->active = 1;
            $objItem->save();
            return 0;
        }
    }
    public function activeAll($arID,$active){
        return DB::table('vne_article as a')
        ->whereIn('article_id',$arID)
        ->update(['active'=>$active]);
    }
    
    public function changeCat($arID,$cat_id){
        return DB::table('vne_article as a')
        ->whereIn('article_id',$arID)
        ->update(['cat_id'=>$cat_id]);
    }

    public function delItem($id){
        $objItem = $this->findOrFail($id);
        return $objItem->delete();
    }

    public function delItemByCatId($catId)
    {
        return DB::table('vne_article')->where('cat_id', '=', $catId)->delete();
    }

    public function getItemsByCatId($catId)
    {
        $arCat = [];
        $arID = DB::table('vne_cat')
            ->select('cat_id')
            ->where('cat_id',$catId)
            ->orWhere('parent_id',$catId)
            ->get();
        foreach ($arID as $value) {
            $arCat[]= $value->cat_id;
        }
        return DB::table('vne_article as a')
        ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
        ->join('vne_cat as c','c.cat_id','a.cat_id')
        ->join('users as u','u.id','a.user_id')
        ->select('a.aname','a.code','a.created_at','a.picture','a.article_id','a.preview_text','a.star_num','c.cname','c.code as ccode','u.username','cv.view')
        ->whereIn('a.cat_id', $arCat)
        ->where('a.active', '=', 1)
        ->orderBy('a.article_id', 'DESC')
        ->paginate(10);
    } 


    public function getArIDCatByCode($codecat) {
        $arCat = [];
        $objCat = DB::table('vne_cat')
            ->select('cat_id')
            ->where('code',$codecat)
            ->first();
        if(!empty($objCat))   {
            $arCat[] = $objCat->cat_id;
            $arID = DB::table('vne_cat')
                ->select('cat_id')
                ->where('parent_id',$objCat->cat_id)
                ->get();
            foreach ($arID as $value) {
                $arCat[]= $value->cat_id;
            }
        }  
        
        return $arCat;
    }
    public function getItemsByCodeCat($codecat)
    {
        $arCat = $this->getArIDCatByCode($codecat);
        if(!empty($arCat)){
            return DB::table('vne_article as a')
            ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
            ->join('vne_cat as c','c.cat_id','a.cat_id')
            ->join('users as u','u.id','a.user_id')
            ->select('a.aname','a.code','a.created_at','a.picture','a.article_id','a.preview_text','a.star_num','c.cname','c.code as ccode','u.username','cv.view')
            ->whereIn('a.cat_id', $arCat)
            ->where('a.active', '=', 1)
            ->orderBy('a.article_id', 'DESC')
            ->paginate(10);
        }
        
    } 
    public function getItemsLienQuan($catId,$article_id)
    {
        return DB::table('vne_article as a')
        ->join('vne_cat as c','c.cat_id','a.cat_id')
        ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
        ->select('a.aname','a.code','a.created_at','a.picture','a.article_id','a.star_num','c.code as ccode','cv.view')
        ->where('a.cat_id', '=', $catId)
        ->where('a.article_id', '!=', $article_id)
        ->where('a.active', '=', 1)
        ->orderBy('a.article_id', 'DESC')
        ->limit(3)->get();
    }   
    public function getItemPL($article_id)
    {
        return DB::table('vne_article as a')
        ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
        ->join('vne_cat as c','c.cat_id','a.cat_id')
        ->join('users as u','u.id','a.user_id')
        ->leftJoin('article_tabs as t', 't.article_id', 'a.article_id')
        ->select('a.*','c.cname','c.code as ccode','a.star_num','u.username','u.avatar','t.tags')
        ->where('a.article_id', '=', $article_id)
        ->where('a.active', '=', 1)
        ->first();
    } 
    public function getItemsBySearch($search)
    {
        return DB::table('vne_article as a')
        ->join('vne_cat as c','c.cat_id','a.cat_id')
        ->select('a.aname','a.code','a.article_id','c.code as ccode','a.star_num')
        ->where(function($query) use ($search) {
            return $query->where('a.aname', 'LIKE','%'.$search.'%')
                        ->orWhere('c.cname', 'LIKE','%'.$search.'%');
        })
        ->where('a.active', '=', 1)
        ->orderBy('a.article_id', 'DESC')
        ->take(10)
        ->get();
    } 
    public function checkCode($code)
    {
        return DB::table('vne_article as a')
        ->where('a.code', '=', $code)
        ->first();
    }  
    public function getItemsNew($sotin)
    {
        return DB::table('vne_article as a')
        ->join('vne_cat as c','c.cat_id','a.cat_id')
        ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
        ->select('a.aname','a.code','a.article_id','a.picture','a.created_at','cv.view','c.code as ccode','a.star_num')
        ->where('a.active', '=', 1)
        ->orderBy('a.article_id', 'DESC')
        ->limit($sotin)
        ->get();
    }

    public function delItems($arId){
        return DB::table('vne_article')->whereIn('article_id', $arId)->delete();
    }

    public function getItemsSearch($arItem = array()){
        $objQuery =DB::table('vne_article as a')
            ->join('vne_cat as c', 'c.cat_id', '=', 'a.cat_id')
            ->select('a.*', 'c.cname','c.code as ccode','a.star_num');
        if ($arItem['name'] != '' && $arItem['name'] != null) {
            $objQuery->where('a.aname', 'like', '%'.$arItem['name'].'%');
        }

        if ($arItem['cat_id'] != '' && $arItem['cat_id'] != null) {
            $objQuery->where('a.cat_id', '=', $arItem['cat_id'])
                    ->orWhere('c.parent_id',$arItem['cat_id']);
        }

        if ($arItem['active'] != '' && $arItem['active'] != null) {
            $active = ( $arItem['active'] == -1 )? 0 : 1 ;
            $objQuery->where('a.active', '=', $active );
        }

        return $objQuery->orderBy('a.article_id', 'DESC')->paginate(30);
    }
    public function getItemsPopular() {
        return DB::table('vne_article as a')
            ->join('vne_cat as c','c.cat_id','a.cat_id')
            ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
            ->select('a.*','cv.view','c.code as ccode')
            ->where('a.active', '=', 1)
            // ->where('a.created_at', '>=', date('Y-m-d',strtotime('-1 week')))
            ->orderBy('a.star_num', 'DESC')
            ->orderBy('cv.view', 'DESC')
            ->orderBy('a.article_id', 'DESC')
            ->limit(5)->get();
    }
    public function setStar($arItem){
        $CKview = 'rateit_'.$arItem['article_id'];
        if(!isset($_COOKIE[$CKview])){
            setcookie("$CKview","1",time()+1800);
            $result = DB::table('stars_post')->insert($arItem);
            $objStar = $this->getStar($arItem['article_id']);
            DB::table('vne_article')->where('article_id',$arItem['article_id'])->update(['star_num' => $objStar->avg]);
            return $result;
        }
        
    }
    public function getStar($article_id){
        return DB::table('stars_post')
        ->select(DB::raw('AVG(star) as avg'), DB::raw('COUNT(article_id) as count') )
        ->groupBy('article_id')
        ->where('article_id',$article_id)
        ->first();
    }
}
