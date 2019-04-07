<?php

namespace App\Widgets;

use App\Model\Vadmin\Core\Article\AcaIndex;
use App\Model\Vadmin\Core\Cat\AccIndex;
use Arrilot\Widgets\AbstractWidget;

class Index03 extends AbstractWidget
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
        // đời sống id = 75
        $cat_id = 4 ;  
        $objCat = AccIndex::find($cat_id);
        $objItems = $objmAcaIdex->getItemsPLByCat($cat_id,6);
        return view('widgets.index03', [
            'config' => $this->config,
            'objItems' => $objItems,
            'objCat' => $objCat,
        ]);
    }
}
