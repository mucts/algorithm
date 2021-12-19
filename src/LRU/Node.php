<?php

namespace MuCTS\Algorithm\LRU;

class Node
{
    public int $k, $v;
    public Node    $l, $r;

    public function __construct(int $k, int $v)
    {
        $this->k = $k;
        $this->v = $v;
    }

}