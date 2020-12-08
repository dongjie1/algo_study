<?php
/**
 * 单向链表节点
 */
class SingleLinkedListNode{
    public $data;
    public $next;

    public function __construct($data=null)
    {
        $this->data = $data;
        $this->next = null;
    }
}