<?php

namespace App\Services;

use App\Mail\ReservationMail;
use App\Models\Reservation;
use App\Repositories\Reservation\ReservationRepository;
use Illuminate\Support\Facades\Mail;

class ReservationService {

    protected ReservationRepository $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository) {
        $this->reservationRepository = $reservationRepository;
    }

    public function store($data) {
        $this->reservationRepository->create($data);
        return redirect()
            ->back()
            ->with('success', 'Reservation created successfully!');
    }

    public function update($id, $data) {
        try {
            $this->reservationRepository->update($id, $data);
            $reservation = Reservation::find($id);
            Mail::to($reservation->user->email)
                ->send(new ReservationMail($reservation));
            return redirect()
                ->route('admin.reservations')
                ->with('success', 'Reservation updated successfully!');
        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Reservation not found!');
        }
    }

}
