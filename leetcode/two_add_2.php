<?php
/**
 * 给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。

如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。

您可以假设除了数字 0 之外，这两个数都不会以 0 开头。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/add-two-numbers
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 *
 */

class Solution{
    function addTwoNumbers($l1,$l2){
        $head = $tail = null;
        $carry = 0;//进位

        while ($l1 || $l2){
            $n1 = $l1?$l1->val:0;
            $n2 = $l2?$l2->val:0;
            $sum = $n1 + $n2 + $carry;

            if(!$head){
                $head = $tail = new ListNode($sum%10);
            }else{
                $tail->next = new ListNode($sum%10);
                $tail = $tail->next;
            }

            $carry = intval($sum/10);

            if($l1){
                $l1 = $l1->next;
            }
            if($l2){
                $l2 = $l2->next;
            }
        }

        if($carry > 0){
            $tail->next = new ListNode($carry);
        }

        return $head;
    }
}