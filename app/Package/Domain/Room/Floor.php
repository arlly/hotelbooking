<?php
namespace App\Package\Domain\Room;

class Floor
{

    private $value;

    public function __construct(int $value)
    {
        if ($value < 101 && $value > 403) {
            throw new \Exception('exception!');
        }
        
        $this->value = $value;
    }

    public function getFloor()
    {
        return $this->value;
    }
}