<?php
/**
 * 无重复数据的单向链表
 */
include_once './SingleLinkedListNode.php';

class SingleLinkedList{
    private $head = null;
    private $tail = null;
    private $length = 0;

    public function __construct()
    {
    }

    public function getPreNode(SingleLinkedListNode $node){
        if($node == null || $this->head == null){
            return null;
        }

        $curNode = $this->head;
        $preNode = $this->head;

        while($curNode->data != $node->data){
            if($curNode == null){
                return null;
            }
            $preNode = $curNode;
            $curNode = $curNode->next;
        }

        return $preNode;

    }

    /**
     * 插入数据:每次在最后插入数据
     * 此链表head不为空
     * @param $data
     * @return SingleLinkedListNode
     */
    public function insert($data){
        if($this->head == null){
            $this->head = new SingleLinkedListNode($data);
            $this->tail = $this->head;
            $this->length = 1;
            return $this->head;
        }
        $this->tail =  $this->insertDataAfter($this->tail,$data);
    }

    public function insertDataAfter(SingleLinkedListNode $orgNode,$data){
        if($orgNode == null){
            return false;
        }

        $newNode = new SingleLinkedListNode($data);
        $newNode->next = $orgNode->next;
        $orgNode->next = $newNode;
        $this->length++;

        return $newNode;
    }

    public function delete($data){
        $node = $this->get($data);
        if(!$node){
            return false;
        }

        $preNode = $this->getPreNode($node);
        if($preNode){
            $preNode->next = $node->next;
            unset($node);
            $this->length--;

            return true;
        }
        return false;
    }

    /**
     * 查找data数据的节点
     * @param $data
     * @return false|null
     */
    public function get($data){
        if(empty($data)){
            return false;
        }

        $curNode = $this->head;
        while ($curNode->data != $data){
            if($curNode->next == null){
                return false;
            }
            $curNode = $curNode->next;
        }
        return $curNode;
    }

    public function getNodeByIndex($index){
        if($index >= $this->length){
            return null;
        }

        $curNode = $this->head;
        for($i=0; $i<$index; $i++){
            $curNode = $curNode->next;
        }
        return $curNode;
    }

    public function getLength(){
        return $this->length;
    }

    public function printNodeList(){
        $curNode = $this->head;
        printf("data -> %s\n",$curNode->data);
        $length = $this->getLength();
        while($curNode->next != null && $length--){
            printf("data -> %s\n",$curNode->next->data);
            $curNode = $curNode->next;
        }
    }
}