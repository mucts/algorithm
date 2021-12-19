<?php

use MuCTS\Algorithm\BiTree\Node;

if (!function_exists('PreOrderTraverse')) {
    /**
     * 先序遍历二叉树
     * 若二叉树为空，则空操作；
     * 否则
     * 1.访问根；
     * 2.先序遍历左子树；
     * 3.先序遍历右子树；
     * @param Node|null $node
     * @return array
     */
    function PreOrderTraverse(?Node $node): array
    {
        if (is_null($node)) return [];
        $rst = [$node->value];
        $rst = array_merge($rst, PreOrderTraverse($node->left));
        return array_merge($rst, PreOrderTraverse($node->right));
    }
}

if (!function_exists('InOrderTraverse')) {
    /**
     * 中序遍历二叉树
     * 若二叉树为空，则空操作；
     * 否则
     * 1.中序遍历左子树；
     * 2.访问根；
     * 3.中序遍历右子树；
     * @param Node|null $node
     * @return array
     */
    function InOrderTraverse(?Node $node): array
    {
        if (is_null($node)) return [];
        $rst = InOrderTraverse($node->left);
        array_push($rst, $node->value);
        return array_merge($rst, InOrderTraverse($node->right));
    }
}

if (!function_exists('PostOrderTraverse')) {
    /**
     * 后序遍历二叉树
     * 若二叉树为空，
     * 则空操作；
     * 否则
     * 1. 后序遍历左子树；
     * 2. 后序遍历右子树；
     * 3. 访问根；
     * @param Node|null $node
     * @return array
     */
    function PostOrderTraverse(?Node $node): array
    {
        if (is_null($node)) return [];
        $rst = PostOrderTraverse($node->left);
        $rst = array_merge($rst, PostOrderTraverse($node->right));
        array_push($rst, $node->value);
        return $rst;
    }
}