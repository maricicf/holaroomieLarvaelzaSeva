<?php

namespace App\Repositories\Reservation;

use App\Models\Property;
use App\Models\Reservation;
use App\Repositories\IResourceRepository;
use DateTime;

class ReservationRepository implements IResourceRepository {

    public function all() {
        // TODO: Implement all() method.
    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function create($data) {
        $propertyId = $data['property_id'];
        $startDate = $data['start_date'];
        $endDate = $data['end_date'];

        $startDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);

        // Calculate the difference
        $interval = $startDate->diff($endDate);

        // Get the number of days in between
        $daysInBetween = $interval->days;

        $property = Property::find($propertyId);

        $prices = $property->getLatestPrices($property);

        $totalPrice = 0;

        // calculate the total price based on the number of days, with price per month, per week and per day
        $totalPrice += $prices[2]->price * floor($daysInBetween / 30);
        $totalPrice += $prices[1]->price * floor($daysInBetween % 30 / 7);
        $totalPrice += $prices[0]->price * floor($daysInBetween % 30 % 7);

        $newReservation = new Reservation();

        $newReservation->start_date = $startDate;
        $newReservation->end_date = $endDate;
        $newReservation->total_price = $totalPrice;
        $newReservation->property_id = $propertyId;
        $newReservation->user_id = auth()->id();
        $newReservation->number_of_guests = 1;

        $newReservation->save();
    }

    public function update($id, $data) {
        try {
            $reservation = Reservation::find($id);
            if (!$reservation) {
                return redirect()
                    ->back()
                    ->with('error', 'Reservation not found!');
            }

            if ($reservation->payment_date != NULL) {
                return redirect()
                    ->back()
                    ->with('error', 'Reservation already paid for!');
            }

            $reservation->payment_date = new DateTime();

            return $reservation->save();
        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error',
                    'An error occurred while updating the reservation!');
        }
    }

    public
    function delete(
        $id
    ) {
        // TODO: Implement delete() method.
    }

}
