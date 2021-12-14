<?php

namespace MuCTS\Algorithm;


class ListNode
{
    public $var;
    /** @var ListNode|null */
    public $next;

    public function __construct($var)
    {
        $this->var = $var;
    }
}