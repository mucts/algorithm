<?php

namespace MuCTS\Algorithm\LRU;

class LRUCache
{
    private int $capacity;

    private Node $head, $tail;
    /** @var Node[] */
    private array $map;

    function __construct(int $capacity)
    {
        $this->capacity = $capacity;
        $this->map      = [];
        $this->head     = new Node(-1, -1);
        $this->tail     = new Node(-1, -1);
        $this->head->r  = $this->tail;
        $this->tail->l  = $this->head;
    }

    /**
     * @param int $key
     * @return int
     */
    function get(int $key): int
    {
        if (array_key_exists($key, $this->map)) {
            $node = $this->map[$key];
            $this->refresh($node);
            return $node->v;
        }
        return -1;
    }

    /**
     * delete 操作：将当前节点从双向链表中移除
     * 由于我们预先建立 head 和 tail 两位哨兵，因此如果 node.l 不为空，则代表了 node 本身存在于双向链表（不是新节点）
     * @param Node $node
     */
    public function delete(Node $node)
    {
        if ($node->l != null) {
            $left       = $node->l;
            $left->r    = $node->r;
            $node->r->l = $left;
        }
    }

    /**
     * refresh 操作分两步：
     * 1. 先将当前节点从双向链表中删除（如果该节点本身存在于双向链表中的话）
     * 2. 将当前节点添加到双向链表头部
     * @param Node $node
     */
    public function refresh(Node $node)
    {
        $this->delete($node);
        $node->r          = $this->head->r;
        $node->l          = $this->head;
        $this->head->r->l = $node;
        $this->head->r    = $node;
    }

    /**
     * @param int $key
     * @param int $value
     */
    function put(int $key, int $value)
    {
        if (array_key_exists($key, $this->map)) {
            $node    = $this->map[$key];
            $node->v = $value;
        } else {
            if (count($this->map) == $this->capacity) {
                $del = $this->tail->l;
                unset($this->map[$del->k]);
                $this->delete($del);
            }
            $node            = new Node($key, $value);
            $this->map[$key] = $node;
        }
        $this->refresh($node);
    }
}