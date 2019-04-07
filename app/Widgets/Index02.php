<?php

namespace App\Widgets;

use App\Model\Vadmin\Core\Article\AcaIndex;
use App\Model\Vadmin\Core\Cat\AccIndex;
use Arrilot\Widgets\AbstractWidget;

class Index02 extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $objmAcaIdex = new AcaIndex();
        $objmAccIdex = new AccIndex();
        // tin sao id = 2
        $cat_id_left = 2 ;  
        $objCatLeft = AccIndex::find($cat_id_left);
        $objItemsLeft = $objmAcaIdex->getItemsPLByCat($cat_id_left,3);

        // giải trí tổng hợp id = 1
        $cat_id_right = 1 ;  
        $objCatRight = AccIndex::find($cat_id_right);
        $objItemsRight = $objmAcaIdex->getItemsPLByCat($cat_id_right,3);
        return view('widgets.index02', [
            'config'        => $this->config,
            'objCatLeft'    => $objCatLeft,
            'objItemsLeft'  => $objItemsLeft,
            'objCatRight'   => $objCatRight,
            'objItemsRight' => $objItemsRight,
        ]);
    }
}
