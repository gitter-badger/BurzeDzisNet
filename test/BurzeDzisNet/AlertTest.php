<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * {@see Alert} test
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class AlertTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers BurzeDzisNet\Alert::getFrom
     */
    public function testGetFrom()
    {
        $alert = new Alert(1, "2015-02-12", "2015-02-18");
        $this->assertSame("2015-02-12", $alert->getFrom());
    }

    /**
     * @covers BurzeDzisNet\Alert::getTo
     */
    public function testGetTo()
    {
        $alert = new Alert(1, "2015-02-12", "2015-02-18");
        $this->assertSame("2015-02-18", $alert->getTo());
    }

    /**
     * @covers BurzeDzisNet\Alert::getLevel
     */
    public function testGetLevel()
    {
        $alert = new Alert(1, "2015-02-12", "2015-02-18");
        $this->assertSame(1, $alert->getLevel());
    }

    /**
     * @covers BurzeDzisNet\Alert::__construct
     */
    public function test__construct()
    {
        $alert = new Alert(1, "2015-02-12", "2015-02-18");
        $this->assertSame(1, $alert->getLevel());
        $this->assertSame("2015-02-12", $alert->getFrom());
        $this->assertSame("2015-02-18", $alert->getTo());
    }
}
