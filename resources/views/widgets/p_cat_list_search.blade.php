<div class="block-content">
    <div class="categori-search  ">
        <select data-placeholder="All Categories" class="chosen-select categori-search-option">
            <option value="" style="font-size: 12px">Tất cả Danh mục</option>
            @foreach ($objPcat as $parent)
            	@if(!$parent->parent_id)
            	<optgroup label="- {{ $parent->cname }}">
            		@php
            			$objScat = getSubCat($parent->cat_id);
            		@endphp
            		@foreach ($objScat as $item)
            			<option value="{{ $item->cat_id }}">{{ $item->cname }}</option>
            		@endforeach
	            </optgroup>
	            @endif
            @endforeach
            
        </select>
    </div>
    <div class="form-search">
        <form>
            <div class="box-group">
                <input type="text" class="form-control" placeholder="Tên sản phẩm...">
                <button class="btn btn-search" type="button"><span>Tìm kiếm</span></button>
            </div>
        </form>
    </div>
</div>
<?php
	function getSubCat($parent_id) {
		$objmAcpcIndex = new \App\Model\Vadmin\Core\PCat\AcpcIndex();
        $objScat = $objmAcpcIndex->getSubActive($parent_id);
        return $objScat;
	}

?>