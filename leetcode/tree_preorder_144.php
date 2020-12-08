<?php

/**
 * 给你二叉树的根节点 root ，返回它节点值的 前序 遍历。
 * https://leetcode-cn.com/problems/binary-tree-preorder-traversal/
 */



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

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $this->dfs($root);
        return $this->res;
    }

    public $res = [];

    function dfs($root){
        if(empty($root)){
            return;
        }
        $this->res[] = $root->val;
        $this->dfs($root->left);
        $this->dfs($root->right);
    }
}