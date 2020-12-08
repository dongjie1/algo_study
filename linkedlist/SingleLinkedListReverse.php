<?php
/**
 * 单向链表反转
 */

//节点
class Node{
    public $data;
    public $next;

    public function __construct($data=null){
        $this->data = $data;
        $this->next = null;
    }
}
//链表
class LinkedList {
    //哨兵头节点,指向第一个节点
    private $head = null;
    private $length = 0;

    public function __construct(){
        $this->head = new Node();
    }

    /**
     * 插入节点到head后面
     * @param $data
     */
    public function insert($data){
//        if($this->head->next == null){
//            $node = new Node($data);
//            $this->head->next = $node;
//            $this->length++;
//        }else{
            $first = $this->head->next;
            $node = new Node($data);
            $node->next = $first;
            $this->head->next = $node;
            $this->length++;
//        }
    }

    /**
     * 反转链表
     */
    public function reverse(){
        if($this->head == null || $this->head->next == null){
            return false;
        }

        $remainNode = null;
        $curNode = $this->head->next;
        $preNode = null;

        $headNode = $this->head;

        $this->head->next = null;//头节点与后面的节点断开

        while ($curNode != null){
            $remainNode = $curNode->next;//保存当前的下一个节点
            $curNode->next = $preNode;//把当前的下一个节点指向前一个节点

            $preNode = $curNode;//把当前节点变成前一个节点
            $curNode = $remainNode;//下一个节点变成当前节点
        }

        //把头节点指向反转后的链表
        $headNode->next = $preNode;

        return true;
    }

    public function printData(){
        $curNode = $this->head->next;
        while($curNode != null){
            printf("data -> %s \n",$curNode->data);
            $curNode = $curNode->next;
        }
    }
}

$linkList = new LinkedList();
$linkList->insert('a');
$linkList->insert('b');
$linkList->insert('c');
$linkList->insert('d');
$linkList->printData();

echo "\n ---------反转后：----------- \n";

$linkList->reverse();
$linkList->printData();
