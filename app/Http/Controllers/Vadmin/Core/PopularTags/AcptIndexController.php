<?php

namespace App\Http\Controllers\Vadmin\Core\PopularTags;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vadmin\Core\About\AcptIndexRequest;
use App\Model\Vadmin\Core\PopularTags\AcptIndex ;
use Illuminate\Http\Request;

class AcptIndexController extends Controller
{
    public function __construct(AcptIndex $objmAcptIndex)
    {
        $this->objmAcptIndex = $objmAcptIndex;
    }

    public function index()
    {
        $objItems = $this->objmAcptIndex->getItems();
        return view('vadmin.core.tags.acaindex.index', compact('objItems'));
    }

    public function getAdd(Request $request)
    {
        return view('vadmin.core.tags.acaindex.add');
    }

    public function postAdd(Request $request)
    {
        $arItem = [
            'tag' => trim($request->tag),
            'sort' => trim($request->sort),
        ];
        if ($this->objmAcptIndex->addItem($arItem)) {
            $request->session()->flash('msg', 'Thêm thành công');
        } else {
            $request->session()->flash('msg', 'Lỗi khi thêm');
            return redirect()->route('vadmin.core.tags.add');
        }
        return redirect()->route('vadmin.core.tags.index');
    }

    public function getEdit($id, Request $request)
    {
        $objItemOld = $this->objmAcptIndex->getItem($id);
        return view('vadmin.core.tags.acaindex.edit', compact('objItemOld'));
    }

    public function postEdit($id, Request $request)
    {
        $arItem = [
            'tag' => trim($request->tag),
            'sort' => trim($request->sort),
        ];
        if ($this->objmAcptIndex->editItem($id, $arItem)) {
            $request->session()->flash('msg', 'Sửa thành công');
        } else {
            $request->session()->flash('msg', 'Lỗi khi sửa');
            return redirect()->route('vadmin.core.tags.edit', $id);
        }
        return redirect()->route('vadmin.core.tags.index');
    }
    public function del($id, Request $request)
    {
        if ($this->objmAcptIndex->delItem($id)) {
            $request->session()->flash('msg', 'Xóa thành công');
        } else {
            $request->session()->flash('msg', 'Lỗi khi Xóa');
        }
        return redirect()->route('vadmin.core.tags.index');
    }
}

