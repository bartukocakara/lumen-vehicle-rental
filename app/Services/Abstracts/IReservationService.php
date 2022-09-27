<?php

namespace App\Services\Abstracts;

use Illuminate\Http\Request;

interface IReservationService
{
    public function list($request);

    public function show($reservationId);

    public function create($request);

    public function update($id, $request);

    public function delete($id);
}
