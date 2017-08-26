<?php
namespace App\Package\Domain\Room;

interface Room
{
    public function setFloor(Floor $floor);
    
    public function setCharge(Charge $charge);
    
    public function setRoomNumber(RoomNumber $roomNumber);
    
    public function getFloor(): Floor;
    
    public function getCharge(): Charge;
    
    public function getRoomNumber(): RoomNumber;
    
}