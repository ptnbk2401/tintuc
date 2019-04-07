<?php

namespace App\Widgets;

use App\Model\Vadmin\Core\Cat\AccIndex;
use Arrilot\Widgets\AbstractWidget;

class MenuTop extends AbstractWidget
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
        $objmAccIndex = new AccIndex();
        $objCat= $objmAccIndex->getItemsActive();
        return view('widgets.menutop', [
            'config' => $this->config,
            'objCat' => $objCat,
        ]);
    }
}
