<?php
namespace App\Package\Infrastructure\Repositories;

use App\Package\Domain\Room\RoomRepositoryInterface;
use App\Package\Infrastructure\Eloquents\EloquentRoom;
use App\Package\Domain\Room\RoomNumber;
use App\Package\Domain\Room\Room;

class RoomRepository implements RoomRepositoryInterface
{

    protected $eloquent;

    public function __construct(EloquentRoom $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function getRoom(RoomNumber $number): Room
    {
        
    }
    
    
    public function findRoom(int $id)
    {
        return $this->eloquent->find($id);
    }
    
}