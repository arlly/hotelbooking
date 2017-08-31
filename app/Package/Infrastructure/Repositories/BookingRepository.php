<?php
namespace App\Package\Infrastructure\Repositories;

use App\Package\Domain\Booking\BookingRepositoryInterface;
use App\Package\Infrastructure\Eloquents\EloquentBooking;
use App\Package\Domain\Booking\BookingDate;
use App\Package\Domain\Room\Room;
use App\Package\Domain\Room\RoomNumber;
use App\Package\Domain\Booking\VacantRooms;

class BookingRepository implements BookingRepositoryInterface
{

    protected $eloquent;

    public function __construct(EloquentBooking $eloquent)
    {
        $this->eloquent = $eloquent;
    }
    
    public function registBookingRoom(BookingDate $date, Room $room) :RoomNumber
    {
        //
        
    }
    
    public function getVacantRooms(BookingDate $date) :VacantRooms
    {
        
    }
}