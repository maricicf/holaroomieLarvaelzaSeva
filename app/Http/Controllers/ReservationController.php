<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller {

    protected ReservationService $reservationService;

    public function __construct(ReservationService $reservationService) {
        $this->reservationService = $reservationService;
    }

    public function index() {
        return $this->reservationService->index();
    }

    public function update(UpdateReservationRequest $request, $id) {
        return $this->reservationService->update($id, $request->all());
    }

    public function store(CreateReservationRequest $request) {
        return $this->reservationService->store($request->all());
    }

}
