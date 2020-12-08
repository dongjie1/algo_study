<?php
/**
 * 二叉树最大深度
 * https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/
 */

class Solution {
    public function maxDepth($root){
        if(empty($root)){
            return 0;
        }

        //左右子树中最大深度+根深度1
        $depth = max($this->maxDepth($root->left),$this->maxDepth($root->right))+1;
        return $depth;
    }

}