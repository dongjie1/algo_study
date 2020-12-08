<?php
include_once './SingleLinkedList.php';

$singleLinkedList = new SingleLinkedList();

$singleLinkedList->insert('a');
$singleLinkedList->insert('b');
$singleLinkedList->insert('c');
$singleLinkedList->insert('d');
$singleLinkedList->insert('e');

$singleLinkedList->printNodeList();

echo "\n----------\n";

$singleLinkedList->delete('c');
$singleLinkedList->printNodeList();

echo "\n---- delete last-----\n";

$singleLinkedList->delete('e');
$singleLinkedList->printNodeList();

echo "\n -------\n";

$singleLinkedList->insert('123');
$singleLinkedList->printNodeList();

echo "\n----------\n";
$node = $singleLinkedList->getNodeByIndex(2);
$singleLinkedList->insertDataAfter($node,'haha');
$singleLinkedList->printNodeList();