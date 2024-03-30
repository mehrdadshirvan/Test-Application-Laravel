<?php

namespace Tests\Unit;

use App\Room;
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_room_has(): void
    {
        $room = new Room(["Jack", "Peter", "Amy"]); // Create a new room
        $this->assertTrue($room->has("Jack")); // Expect true
        $this->assertFalse($room->has("Eric")); // Expect false
    }

    public function test_room_add(): void
    {
        $room = new Room(["Jack", "Peter", "Amy"]); // Create a new room
        $this->assertContains('Mehrdad Shirvan',$room->add("Mehrdad Shirvan")); // Expect true
    }

    public function test_room_remove()
    {
        $room = new Room(["Jack", "Peter"]); // Create a new room
        $this->assertCount(1, $room->remove("Peter"));
    }
}
