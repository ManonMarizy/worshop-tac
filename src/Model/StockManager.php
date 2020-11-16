<?php

namespace App\Model;

class StockManager extends AbstractManager
{
    public const TABLE = 'stock';

    /**
     * stockManager constructor.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param int $id
     * @return int
     */
    public function decrementStock(int $id): int
    {
        $actualStock = $this->pdo->query('SELECT quantity FROM ' . $this->table)->fetch();

        $query = 'UPDATE stock SET quantiy = ' . ($actualStock - 1) . 'WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
