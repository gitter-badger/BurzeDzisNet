<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace BurzeDzisNet;

/**
 * Single weather alert
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Alert
{
    protected $name = "";
    protected $level = 0;
    protected $from = "";
    protected $to = "";

    public function __construct($name, $level, $from, $to)
    {
        $this->name = $name;
        $this->level = $level;
        $this->from = $from;
        $this->to = $to;
    }

    public function __toString()
    {
        return \sprintf("%s[%d,%s-%s]", $this->getName(), $this->getLevel(), $this->getFrom(), $this->getTo());
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }

}