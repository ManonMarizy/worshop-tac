<?php

namespace App\Controller;

use App\Model\StockManager;

class StockController extends AbstractAPIController
{
    /**
     * @return false|string
     */
    public function all()
    {
        $stockManager = new StockManager();
        $stock = $stockManager->selectAll();
        return json_encode($stock);
    }

    /**
     * @param int $id
     * @return int
     */
    public function buy(int $id): int
    {
        $stockManger = new StockManager();
        return $stockManger->decrementStock($id);
    }
}
