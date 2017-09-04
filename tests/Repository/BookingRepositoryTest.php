<?php
namespace Tests\Repository;

use Tests\TestCase;
use App\package\Infrastructure\Eloquents\EloquentRoom;
use App\Package\Domain\Room\RoomRepositoryInterface;
use App\Package\Infrastructure\Repositories\RoomRepository;
use Illuminate\Foundation\Testing\Concerns\MocksApplicationServices as Mockery;
use Illuminate\Support\Facades\Cache;
use App\Package\Domain\Booking\BookingDate;
use App\Package\Domain\Booking\BookingRepositoryInterface;

class BookingRepositoryTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        
        // $this->mock = Cache::mock(Member::class);
        /*
        $this->mock = $this->getMockBuilder(EloquentRoom::class)
            ->setMethods(['find'])
            ->getMock();
        ;
        */
    }

    public function testFind()
    {
        $date = '2017-01-01';
        $BookingDate = new BookingDate($date);
        
        $this->repo = $this->app->make(BookingRepositoryInterface::class);
        
        $rooms = $this->repo->getVacantRooms($BookingDate);
        
        //DBに空き室がないこと前提のテスト
        $this->assertEquals(12, count($rooms->get()));
    }

    

    public function tearDown()
    {
        parent::tearDown();
        // Mockery::close();
    }
}