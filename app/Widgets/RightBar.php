<?php

namespace App\Widgets;

use App\Model\Vadmin\Core\Article\AcaIndex;
use App\Model\Vadmin\Core\Cat\AccIndex;
use App\Model\Vadmin\Core\Comment\AccIndex as AccmIndex;
use Arrilot\Widgets\AbstractWidget;

class RightBar extends AbstractWidget
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
        $objmAccIndex = new AccIndex();
        $objmAcaIndex = new AcaIndex();
        $objmAccmIndex = new AccmIndex();
        $objCat= $objmAccIndex->getItemsActive();
        $objNewPost= $objmAcaIndex->getItemsNew(5);
        $objPopular= $objmAcaIndex->getItemsPopular();
        $objComment= $objmAccmIndex->getItemsNew();
        // dd($objPopular);
        return view('widgets.right_bar', [
            'config' => $this->config,
            'objCat' => $objCat,
            'objNewPost' => $objNewPost ,
            'objPopular' => $objPopular ,
            'objComment' => $objComment ,
        ]);
    }
}
