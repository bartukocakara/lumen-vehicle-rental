<?php

namespace App\Repositories\Abstracts;

interface IVehicleRepository extends IRepository
{
    public function show($id);
}
