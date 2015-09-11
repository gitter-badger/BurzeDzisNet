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
    protected $level = 0;
    protected $from = "";
    protected $to = "";

    public function __construct($level, $from, $to)
    {
        $this->level = $level;
        $this->from = $from;
        $this->to = $to;
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