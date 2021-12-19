<?php

namespace MuCTS\Algorithm\BiTree;

class Node
{
    public mixed $value;
    public ?Node $right, $left;

    public function __construct(mixed $value)
    {
        $this->value = $value;
        $this->left  = null;
        $this->right = null;
    }
}