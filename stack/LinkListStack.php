<?php
require_once '../linkedlist/SingleLinkedListNode.php';

/**
 * 链表栈
 * Class LinkListStack
 */
class LinkListStack{
    /**
     * @var null 头节点
     */
    private $head;
    /**
     * @var int 长度
     */
    private $length;

    public function __construct(){
        $this->head = new SingleLinkedListNode();
        $this->length = 0;
    }

    public function push($data){
        $this->pushData($data);
    }

    public function pushData($data){
        $node = new SingleLinkedListNode($data);
        $node->next = $this->head->next;
        $this->head->next = $node;
        $this->length++;
    }

    public function pop(){
        if($this->length == 0){
            return false;
        }
        $node = $this->head->next;
        $this->head->next = $node->next;
        $this->length--;
        return $node->data;
    }

    public function printData(){
        $curr = $this->head;
        while ($curr->next != null){
            printf("data ==> %s\n",$curr->next->data);
            $curr = $curr->next;
        }
    }
}

$st = new LinkListStack();
$st->push('a');
$st->push('b');
$st->push('c');
$st->push('d');
$st->printData();

echo "\n ============= \n";

var_dump("pop1==",$st->pop());
$st->printData();
var_dump('pop2==', $st->pop());
$st->printData();