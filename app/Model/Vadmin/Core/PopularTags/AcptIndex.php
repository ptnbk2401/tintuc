<?php
namespace App\Model\Vadmin\Core\PopularTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Nestable\NestableTrait;

class AcptIndex extends Model 
{
    protected $table = "popular_tags";
    protected $primaryKey = "id";
    public $timestamps = false;
    use NestableTrait;

    public function __construct(){

    }

    public function getItems(){
        return DB::table('popular_tags')->orderBy('sort', 'ASC')->orderBy('id', 'DESC')
            ->get();
    }

    public function getItem($id){
        return $this->findOrFail($id);
    }
    
    public function addItem($arItem){
        return DB::table('popular_tags')->insertGetId($arItem);
    }

    public function delItem($id){
        return DB::table('popular_tags')->where('id', $id)->delete();
    }

    public function editItem($id, $arItem){
        return DB::table('popular_tags')->where('id', $id)->update($arItem);
    }

    

}


