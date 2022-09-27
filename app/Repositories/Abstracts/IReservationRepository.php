<?php

namespace App\Repositories\Abstracts;

interface IReservationRepository extends IRepository
{
    public function list($request);
    public function create($request);
    public function show($reservationId);
    public function update($reservationId, $request);
    public function delete($delete);
}
