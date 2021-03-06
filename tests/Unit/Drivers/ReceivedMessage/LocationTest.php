<?php

declare(strict_types=1);

namespace Tests\Unit\Drivers\ReceivedMessage;

use Tests\TestCase;
use FondBot\Drivers\ReceivedMessage\Location;

class LocationTest extends TestCase
{
    public function test()
    {
        $location = new Location($latitude = $this->faker()->latitude, $longitude = $this->faker()->longitude);

        $this->assertSame($latitude, $location->getLatitude());
        $this->assertSame($longitude, $location->getLongitude());
    }
}
