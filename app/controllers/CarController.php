<?php

require_once MODELS . '/CarModel.php';

class CarController
{
    private $carModel;

    public function __construct()
    {
        $this->carModel = new CarModel();
    }

    public function displayCarsBeforeDate()
    {
        $cars = $this->carModel->getCarsBeforeDate('2018-09-01');
        require VIEWS . '/carsBeforeDate.php';
    }
    public function displayCarsWithWork()
    {
        $cars = $this->carModel->getCarsWithWork(1000);
        require VIEWS . '/carsWithWork.php';
    }

    public function displayAllCarsSortedByBodyType()
    {
        $cars = $this->carModel->getAllCarsSortedByBodyType();
        require VIEWS . '/allCarsSortedByBodyType.php';
    }
}
