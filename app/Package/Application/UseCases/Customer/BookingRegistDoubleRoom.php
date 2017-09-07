<?php
namespace App\Package\Application\UseCases\Customer;

use App\Package\Domain\Booking\BookingDate;
use App\Package\Domain\Room\Room;
use App\Package\Domain\Booking\BookingRepositoryInterface;
use App\Package\Domain\Room\RoomNumber;
use App\Package\Domain\Models\Entity\EntityCollectionInterface;

class BookingRegistDoubleRoom implements BookingRegistRoomInterface
{

    protected $bookingRepo;

    public function __construct(BookingRepositoryInterface $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function getBookingRoomNumber(EntityCollectionInterface $collection): RoomNumber
    {
        foreach ($collection->get() as $element) {
            if ($element->getRoomType() == 'double') {
                return (new RoomNumber($element->getRoomNumber()));
            }
        }
        
        return false;
    }

    public function bookingRegistRoom(BookingDate $date, Room $room): RoomNumber
    {
        return $this->bookingRepo->registBookingRoom($date, $room);
    }
}