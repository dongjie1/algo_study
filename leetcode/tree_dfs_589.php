<?php
/**
 *
 * N叉树的前序遍历
 * https://leetcode-cn.com/problems/n-ary-tree-preorder-traversal/
 *
 */


  class Node {
      public $val = null;
      public $children = null;
      function __construct($val = 0) {
          $this->val = $val;
          $this->children = array();
      }
  }


class Solution {
    public $path = [];
    /**
     * 递归
     * @param Node $root
     * @return integer[]
     */
    function preorder($root) {
        $this->dfs($root);
        return $this->path;

    }

    function dfs($node){
        if(!$node){
            return;
        }
        $this->path[] = $node->val;
        if($node->children){
            foreach($node->children as $item){
                $this->dfs($item);
            }
        }
    }

    /**
     * 遍历
     * @param $root
     * @return array
     */
    function itor($root){
        if(!$root){
            return [];
        }
        $stack = [$root];

        $res = [];

        while ($stack){
            $root = array_pop($stack);

            if(!$root){
                continue;
            }

            $res[] = $root->val;

            $tmp = array_reverse($root->children);
            foreach($tmp as $item){
                $stack[] = $item;
            }
        }

        return $res;
    }
}