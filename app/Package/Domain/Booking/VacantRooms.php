<?php
namespace App\Package\Domain\Booking;

use App\Package\Domain\Models\Entity\EntityCollectionInterface;
use App\Package\Domain\Models\Entity\EntityInterface;

class VacantRooms implements EntityCollectionInterface
{

    protected $vacantRoomElements;

    public function __construct()
    {
        //
    }

    public function add(EntityInterface $element)
    {
        if (! $element instanceof VacantRoomElements) {
            throw new \Exception("Instance Error");
        }
        
        $this->vacantRoomElements[] = $element;
        return $this;
    }

    public function get()
    {
        return $this->vacantRoomElements;
    }

    public function remove(EntityInterface $element)
    {
        //
    }
    
    //ダブルの部屋取得
    public function getDoubleRoomList()
    {
        
    }
    
    //シングルの部屋取得
    public function getSingleRoomList()
    {
    
    }
    
    //ダブルの部屋の空きがあるか？
    public function isDoubleRoom()
    {
        
    }
    
    //シングルの部屋の空きがあるか？
    public function isSingleRoom()
    {
    
    }
    
    
}