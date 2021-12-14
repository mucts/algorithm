<?php

function ReverseList(\MuCTS\Algorithm\ListNode $head)
{
    $new = null;
    while (!is_null($head)) {
        $tmp        = $head->next;
        $head->next = $new;
        $new        = $head;
        $head       = $tmp;
    }
    return $new;
}