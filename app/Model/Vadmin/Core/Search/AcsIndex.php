<?php

namespace App\Model\Vadmin\Core\Search;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Model\Vadmin\Core\Article\AcaIndex;
class AcsIndex extends Model
{

    public function searchCat($content) {
        return DB::table('vne_cat as c')
        ->where('cname','LIKE',"%$content%")
        ->select('cat_id','code')
        ->get();
    }
    public function search($content)
    {
        $objmAcaIndex = new AcaIndex();
        $arCat = $this->searchCat($content);
        return DB::table('vne_article as a')
        ->join('vne_cat as c', 'c.cat_id','a.cat_id')
        ->leftJoin('article_tabs as t', 't.article_id', 'a.article_id')
        ->select('a.*', 'c.cname','c.code as ccode','t.tags')
        ->where(function($query) use ($content){
            if (!empty($content)) {
                $query->where('aname','LIKE',"%$content%")
                ->orwhere('tags','LIKE',"%$content%");
            }
            return $query;
        })
        ->orWhere(function($query) use ($arCat,$objmAcaIndex){
            if(!empty($arCat)) {
                $arID=[];
                foreach ($arCat as $cat) {
                    $arIDCat = $objmAcaIndex->getArIDCatByCode($cat->code);
                    if(is_array($arIDCat)) {
                        $arID = array_merge($arID,$arIDCat);
                    }
                }
                // dd($arID);
                $query->whereIn('a.cat_id',$arID);
            }
            return $query;
        })
        ->paginate(15);
    }

    
}
