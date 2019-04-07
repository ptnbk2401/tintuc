<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class PCatList extends AbstractWidget
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
        //
        $objmAcpcIndex = new \App\Model\Vadmin\Core\PCat\AcpcIndex();
        $objPcat= $objmAcpcIndex->getParentActive();
        return view('widgets.p_cat_list', [
            'config' => $this->config,
            'objPcat' => $objPcat
        ]);
    }
}
