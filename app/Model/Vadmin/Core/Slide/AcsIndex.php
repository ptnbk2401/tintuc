<?php

namespace App\Model\Vadmin\Core\Slide;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AcsIndex extends Model
{
    protected $table = "core_slide";
    protected $primaryKey = "slide_id";
    public    $timestamps = false;

    public  function getItems() {
        return DB::table('core_slide as s')
            ->join('vne_cat as c', 'c.cat_id','a.cat_id')
            ->join('vne_article as a','a.article_id','s.article_id')
            ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
            ->select('s.*','a.aname','a.code', 'c.cname', 'cv.view','c.code as ccode')
            ->where('s.vitri', 'slide')
            ->orderBy('sort', 'DESC')
            ->orderBy('s.slide_id', 'DESC')
            ->paginate(getenv('ADMIN_PAGE'));
    }
    public  function getItemsLeft() {
        return DB::table('core_slide as s')
            ->join('vne_cat as c', 'c.cat_id','a.cat_id')
            ->join('vne_article as a','a.article_id','s.article_id')
            ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
            ->select('s.*','a.aname','a.code', 'c.cname', 'cv.view','c.code as ccode')
            ->where('s.vitri', 'left')
            ->orderBy('sort', 'DESC')
            ->orderBy('s.slide_id', 'DESC')
            ->paginate(getenv('ADMIN_PAGE'));
    }

    public function addItem($arItem){
        return DB::table('core_slide')->insert($arItem);
    }

   
    public function getItem($id){
        return DB::table('core_slide as s')
            ->join('vne_cat as c', 'c.cat_id','a.cat_id')
            ->join('vne_article as a','a.article_id','s.article_id')
            ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
            ->select('s.*','a.aname','a.code', 'c.cname', 'cv.view','c.code as ccode')
            ->where('s.slide_id',$id)
            ->first();
    }

    public function editItem($id, $arItem){
        try {
            DB::table('core_slide')
                ->where('slide_id', $id)
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
    
    public function delItem($id){
        $objItem = $this->findOrFail($id);
        return $objItem->delete();
    }

    public function getItemsPl()
    {
        return DB::table('core_slide as s')
            ->join('vne_article as a','a.article_id','s.article_id')
            ->join('vne_cat as c','c.cat_id','a.cat_id')
            ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
            ->select('s.*','a.aname','a.code','a.created_at','cv.view','c.cname' ,'c.code as ccode')
            ->where('s.active', 1)
            ->where('s.vitri', 'slide')
            ->orderBy('s.sort', 'DESC')
            ->orderBy('slide_id', 'DESC')
            ->get();
    }
    public  function getItemsPlLeft() {
        return DB::table('core_slide as s')
            ->join('vne_article as a','a.article_id','s.article_id')
            ->join('vne_cat as c','c.cat_id','a.cat_id')
            ->leftjoin('count_view as cv', 'cv.article_id', '=', 'a.article_id')
            ->select('s.*','a.aname','a.code','a.created_at','cv.view', 'c.cname','c.code as ccode')
            ->where('s.vitri', 'left')
            ->orderBy('sort', 'DESC')
            ->orderBy('s.slide_id', 'DESC')
            ->take(3)
            ->get();
    }
}
