<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class CatList extends AbstractWidget
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
        $objmAccIndex = new \App\Model\Vadmin\Core\Cat\AccIndex;;
        $objcat= $objmAccIndex->getItemsActive();
        return view('widgets.cat_list', [
            'config' => $this->config,
            'objcat' => $objcat
        ]);
    }
}
