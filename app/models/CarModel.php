<?php
// Подключение к базе данных
require_once DATABASE . '/config.php';

class CarModel
{
    public function getCarsBeforeDate($date)
    {
        $pdo = getPDOConnection();
        $sql = "SELECT 
                    cb.name AS Марка,
                    cm.name AS Модель,
                    cm.end_date AS Дата_снятия_с_производства
                FROM 
                    car_models cm
                JOIN 
                    car_brands cb ON cm.brand_id = cb.id
                WHERE 
                    cm.end_date < :date";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['date' => $date]);
        return $stmt->fetchAll();
    }

    public function getCarsWithWork($minPrice)
    {
        $pdo = getPDOConnection();
        $sql = "SELECT 
                    cb.name AS Марка,
                    cm.name AS Модель,
                    wp.work_name AS Наименование_работ,
                    wp.price AS Стоимость_работ
                FROM
                    car_models cm
                JOIN
                    car_brands cb ON cm.brand_id = cb.id
                JOIN
                    work_prices wp ON cm.id = wp.model_id
                WHERE
                    cm.end_date IS NULL AND wp.price > :price";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['price' => $minPrice]);
        return $stmt->fetchAll();
    }

    public function getAllCarsSortedByBodyType()
    {
        $pdo = getPDOConnection();
        $sql = "SELECT 
                    cb.name AS Марка,
                    cm.name AS Модель,
                    cm.body_type AS Тип_кузова
                FROM
                    car_models cm
                JOIN
                    car_brands cb ON cm.brand_id = cb.id
                ORDER BY
                    cm.body_type";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
