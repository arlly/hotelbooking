<?php
namespace App\Package\Domain\Room;

class RoomNumber
{

    private $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new \Exception('exception!');
        }
        
        $this->value = $value;
    }

    public function getRoomNumber()
    {
        return $this->value;
    }
}