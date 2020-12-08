<?php
class TreeNode{
    public $val;
    public $left;
    public $right;

    public function __construct($val)
    {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
    }
}

class Solution {
    public $path = [];
    function inOrderTree($root){
        if($root){
            $this->inOrderTree($root->left);
            if($root->val) $this->path[] = $root->val;
            $this->inOrderTree($root->right);
        }
        return $this->path;
    }

}

$root = new TreeNode(1);
$root->left = new TreeNode(null);
$root->right = new TreeNode(2);
$root->right->left = new TreeNode(3);

$sl = new Solution();
$path = $sl->inOrderTree($root);
print_r($path);


$a = array_slice([1,2,3],1,2);
var_dump($a);

