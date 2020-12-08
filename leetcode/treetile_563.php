<?php
/**
 * 二叉树坡度
 * 一个树的 节点的坡度 定义即为，该节点左子树的节点之和和右子树节点之和的 差的绝对值 。
 * 如果没有左子树的话，左子树的节点之和为 0 ；没有右子树的话也是一样。空结点的坡度是 0 。
 * 整个树 的坡度就是其所有节点的坡度之和。
 * 链接：https://leetcode-cn.com/problems/binary-tree-tilt
 */

/**
 * Definition for a binary tree node.
 * */

class TreeNode {
      public $val = null;
      public $left = null;
      public $right = null;
      function __construct($val = 0, $left = null, $right = null) {
          $this->val = $val;
          $this->left = $left;
          $this->right = $right;
      }
}

class Solution {

    private $tilt = 0;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function findTilt($root) {
        $this->dfs($root);
    }

    /**
     * @param TreeNode $root
     * @return float|int
     */
    function dfs($root){
        if(empty($root)){
            return 0;
        }

        $left_sum = $this->dfs($root->left);
        $right_sum = $this->dfs($root->right);

        $this->tilt += abs($left_sum - $right_sum);

        return $root->val + $left_sum + $right_sum;
    }

    function printTilt(){
        echo 'tilt ==> ' . $this->tilt;
    }
}

//$root = new TreeNode(1);
//$root->left = new TreeNode(2);
//$root->right = new TreeNode(3);

$root = new TreeNode(4);
$root->left = new TreeNode(2);
$root->right = new TreeNode(9);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(5);
$root->right->left = null;
$root->right->right = new TreeNode(7);

$sl = new Solution();
$sl->findTilt($root);
$sl->printTilt();


