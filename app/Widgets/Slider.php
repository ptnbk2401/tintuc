<?php

namespace App\Widgets;

use App\Model\Vadmin\Core\Article\AcaIndex;
use App\Model\Vadmin\Core\Slide\AcsIndex;
use Arrilot\Widgets\AbstractWidget;

class Slider extends AbstractWidget
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
        $objmAcsIdex = new AcsIndex();
        $objItemsNew7 = $objmAcaIdex->getItemsNew(7);
        $objItemsSlide = $objmAcsIdex->getItemsPl();
        $objItemsLeft = $objmAcsIdex->getItemsPlLeft();
        return view('widgets.slider', [
            'config' => $this->config,
            'objItemsNew7' => $objItemsNew7,
            'objItemsSlide' => $objItemsSlide,
            'objItemsLeft' => $objItemsLeft,
        ]);
    }
}
