<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package\Application\UseCases\Customer\GetVacantRoomList;
use App\Package\Domain\Booking\BookingDate;

class RoomListController extends Controller
{
    //
    public function index($date, GetVacantRoomList $usecase)
    {
        $vacantRoom = $usecase->vacantRoomList((new BookingDate($date)));
        
        return view('room.index', [
            'VacantRoom' => $vacantRoom
        ]);
    }
}
