<?php
namespace App\Package\Domain\Room;

class SingleRoom implements Room
{
    protected $floor;
    protected $charge;
    protected $roomNumber;
    
    public function setFloor(Floor $floor)
    {
        $this->floor = $floor;
        return $this;
    }
    
    
    public function setCharge(Charge $charge)
    {
        $this->charge = $charge;
        return $this;
    }
    
    public function setRoomNumber(RoomNumber $roomNumber)
    {
        $this->roomNumber = $roomNumber;
        return $this;
    }
    
    public function getFloor(): Floor
    {
        return $this->floor;
    }
    
    public function getCharge(): Charge
    {
        return $this->charge;
    }
    
    public function getRoomNumber(): RoomNumber
    {
        return $this->roomNumber;
    }
}