<?php
require_once '../linkedlist/SingleLinkedListNode.php';

/**
 * 链队列
 */
class QueueLinkedList{
    /**
     * @var SingleLinkedListNode  头
     */
    private $head;
    /**
     * @var SingleLinkedListNode 尾
     */
    private $tail;
    /**
     * @var int 长度
     */
    private $length;

    public function __construct()
    {
        $this->head = new SingleLinkedListNode();
        $this->tail = $this->head;
        $this->length = 0;
    }

    /**
     * 入队
     * @param $data
     */
    public function enQueue($data){
        $node = new SingleLinkedListNode($data);

        $this->tail->next = $node;
        $this->tail = $node;
        $this->length++;
    }

    /**
     * 出队
     */
    public function deQueue(){
        if($this->length == 0){
            return false;
        }
        $node = $this->head->next;

        $this->head->next = $this->head->next->next;
        $this->length--;

        return $node;
    }

    public function getLength(){
        return $this->length;
    }

    public function printData(){
        if($this->length == 0){
            echo 'empty queue' .PHP_EOL;
            return;
        }
        $curr = $this->head;
        while($curr->next != null){
            printf("data => %s\n",$curr->next->data);
            $curr = $curr->next;
        }
        echo "\n============================\n";
    }
}

$queue = new QueueLinkedList();
$queue->enQueue('a');
$queue->enQueue('b');
$queue->enQueue('c');
$queue->printData();
$queue->deQueue();
$queue->printData();