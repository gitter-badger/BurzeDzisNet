<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

use PHPUnit_Framework_TestCase;

/**
 * {@see Alert} test
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class AlertTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers BurzeDzisNet\Alert::getStartDate
     */
    public function testGetStartDate()
    {
        $alert = new Alert(1, "2015-02-12", "2015-02-18");
        $this->assertSame("2015-02-12", $alert->getStartDate());
    }

    /**
     * @covers BurzeDzisNet\Alert::getEndDate
     */
    public function testGetEndDate()
    {
        $alert = new Alert(1, "2015-02-12", "2015-02-18");
        $this->assertSame("2015-02-18", $alert->getEndDate());
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
        $this->assertSame("2015-02-12", $alert->getStartDate());
        $this->assertSame("2015-02-18", $alert->getEndDate());
    }
}
