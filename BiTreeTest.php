<?php
/**
 * 二叉树测试
 */

use MuCTS\Algorithm\BiTree\Node;

require "vendor/autoload.php";

$a = new Node('A');
$b = new Node('B');
$c = new Node('C');
$d = new Node('D');
$e = new Node('E');
$f = new Node('F');
$g = new Node('G');
$h = new Node('H');
$i = new Node('I');
$j = new Node('J');
$k = new Node('K');
$l = new Node('L');

$a->left  = $b;
$a->right = $c;
$b->left  = $d;
$b->right  = $e;
$c->left = $f;
$c->right = $g;
$d->left = $h;
$d->right = $i;
$e->left = $j;
$e->right = $k;
$f->left = $l;

echo json_encode(PreOrderTraverse($a)), PHP_EOL;
echo json_encode(InOrderTraverse($a)), PHP_EOL;
echo json_encode(PostOrderTraverse($a)), PHP_EOL;


