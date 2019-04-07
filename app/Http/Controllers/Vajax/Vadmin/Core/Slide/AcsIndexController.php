<?php
namespace App\Http\Controllers\Vajax\Vadmin\Core\Slide;
use App\Http\Controllers\Controller;
use App\Model\Vadmin\Core\Article\AcaIndex;
use App\Model\Vadmin\Core\Slide\AcsIndex;
use Illuminate\Http\Request;


class AcsIndexController extends Controller
{
    public function __construct(AcsIndex $objmAcsIndex)
    {
        $this->objmAcsIndex = $objmAcsIndex;
    }

    public function activeStatus(Request $request)
    {
        $id = $request->aid;
        if ($this->objmAcsIndex->updateStatus($id) == 1) {
            return '<i class="glyphicon glyphicon-remove" style="color: #f1635f;"></i>';
        } else {
            return '<i class="glyphicon glyphicon-ok" style="color: #3795f4;"></i>';
        }
    }
    public function searchArticle(AcaIndex $objmAcaIndex,Request $request)
    {
        $search = $request->search;
        $Items =  $objmAcaIndex->getItemsBySearch($search);
        return response()->json(['items'=>$Items]);
    }
    public function getData(AcaIndex $objmAcaIndex,Request $request)
    {
        $article_id = $request->article_id;
        $Item =  $objmAcaIndex->getItem($article_id);
        $link = route('vpublic.core.pcbloglist.detail',[$Item->article_id,str_slug($Item->aname)]);
        $picture = $Item->picture;
        $data = ['link'=>$link,'picture'=>$picture];
        return $data;
    }
}
