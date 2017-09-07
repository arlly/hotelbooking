<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package\Application\UseCases\Customer\GetVacantRoomList;
use App\Package\Domain\Booking\BookingDate;
use App\Package\Domain\Room\RoomRepositoryInterface;
use App\Package\Application\UseCases\Customer\BookingRegistRoomFactory;

class RoomListController extends Controller
{
    //
    protected $factory;

    protected $roomRepo;

    public function __construct(BookingRegistRoomFactory $factory, RoomRepositoryInterface $roomRepo)
    {
        $this->factory = $factory;
        $this->roomRepo = $roomRepo;
    }

    public function index($date, GetVacantRoomList $usecase)
    {
        $vacantRoom = $usecase->vacantRoomList((new BookingDate($date)));
        
        return view('room.index', [
            'VacantRoom' => $vacantRoom
        ]);
    }

    public function bookingSingleRoom($date, GetVacantRoomList $usecase)
    {
        $Date = new BookingDate($date);
        $vacantRoom = $usecase->vacantRoomList($Date);
        
        if (! $vacantRoom->isSingleRoom()) {
            throw new \Exception('空き部屋がありません！！');
        }
        
        $usecase = $this->factory->factory('single');
        $RoomNumber = $usecase->getBookingRoomNumber($vacantRoom);
        
        $Room = $this->roomRepo->getRoom($RoomNumber);
        $BookingRegistRoomNumber = $usecase->bookingRegistRoom($Date, $Room);
        
        return view('room.bookingRegist', [
            'BookingRegistRoomNumber' => $BookingRegistRoomNumber
        ]);
    }

    public function bookingDoubleRoom($date, GetVacantRoomList $usecase)
    {
        //
        $Date = new BookingDate($date);
        $vacantRoom = $usecase->vacantRoomList($Date);
        
        if (! $vacantRoom->isDoubleRoom()) {
            throw new \Exception('空き部屋がありません！！');
        }
        
        $usecase = $this->factory->factory('double');
        $RoomNumber = $usecase->getBookingRoomNumber($vacantRoom);
        
        $Room = $this->roomRepo->getRoom($RoomNumber);
        $BookingRegistRoomNumber = $usecase->bookingRegistRoom($Date, $Room);
        
        return view('room.bookingRegist', [
            'BookingRegistRoomNumber' => $BookingRegistRoomNumber
        ]);
    }
}
