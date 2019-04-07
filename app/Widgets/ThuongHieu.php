<?php

namespace App\Widgets;

use App\Model\Vadmin\Core\Thuonghieu\ActhIndex;
use Arrilot\Widgets\AbstractWidget;

class ThuongHieu extends AbstractWidget
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
        $objTH = new ActhIndex();
        $ThuongHieuItems = $objTH->getItems();
        return view('widgets.thuonghieu', [
            'config' => $this->config,
            'ThuongHieuItems' => $ThuongHieuItems
        ]);
    }
}
