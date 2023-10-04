<?php

namespace App\Repositories\District;



Interface DistrictRepositoryInterface
{
    public function getAll();

    public function getAllInPage();

    public function getById($id);


}
