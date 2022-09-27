<?php

namespace App\Services\Concrete;

use App\Repositories\Abstracts\IVehicleRepository;
use App\Services\Abstracts\IVehicleService;

class VehicleService implements IVehicleService
{
    /**
     * @var IVehicleRepository
     */
    private IVehicleRepository $repository;

    /**
     * PlayerService constructor.
     * @param IVehicleRepository $VehicleRepository
     */
    public function __construct(IVehicleRepository $VehicleRepository)
    {
        $this->repository = $VehicleRepository;
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }
}
