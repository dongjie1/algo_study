<?php
/**
 * 验证二叉搜索树是否正确
 * https://leetcode-cn.com/problems/validate-binary-search-tree/
 */

class Solution {

    private $pre = PHP_INT_MIN;
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {
        if(empty($root)){
            return true;
        }

        $left = $this->isValidBST($root->left);//遍历左子树

        if($root->val <= $this->pre){//访问当前节点：如果当前节点小于等于中序遍历的前一个节点，说明不满足BST，返回 false；否则继续遍历。
            return false;
        }

        $this->pre = $root->val;

        $right = $this->isValidBST($root->right);//遍历右子树

        return $left && $right;
    }
}