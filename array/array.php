<?php
namespace algo_php;

class MyArray{
    //数据
    private $data;
    //容量
    private $capacity;
    //长度
    private $length;

    public function __construct($capacity)
    {
        $capacity = intval($capacity);
        if($capacity <= 0){
            throw new Exception('the capacity error');
        }

        $this->data = array();
        $this->capacity = $capacity;
        $this->length = 0;
    }

    /**
     * 检查数据是否已满
     * @return bool
     */
    public function isFull(){
        return $this->length == $this->capacity;
    }

    /**
     * 检查是否越界
     * @param $index
     * @return bool
     */
    public function isOutOfRange($index){
        return $index >= $this->length;
    }

    /**
     * 插入一个数据
     * @param $index
     * @param $value
     * @return bool
     * @throws Exception
     */
    public function insert($index,$value){
        $index = intval($index);
        if ($index < 0) {
            throw new Exception('index error',10001);
        }
        if ($this->isFull()){
            throw new Exception('array is full',10002);
        }

        for($i = $this->length-1; $i>=$index; $i--){
            $this->data[$i+1] = $this->data[$i];
        }

        $this->data[$index] = $value;
        $this->length++;
        return true;
    }

    public function delete($index){
        $index = intval($index);
        if ($index < 0){
            throw new Exception('index error',10001);
        }

        if ($this->isOutOfRange($index)){
            throw new Exception('index out of range',10003);
        }

        $v = $this->data[$index];
        for($i=$index; $i<$this->length-1; $i++){
            $this->data[$i] = $this->data[$i+1];
        }
        unset($this->data[$this->length-1]);
        $this->length--;

        return $v;
    }

    public function get($index){
        $index = intval($index);
        if ($index < 0) {
            throw new Exception('index error',10001);
        }

        if ($this->isOutOfRange($index)){
            throw new Exception('index out of range',10003);
        }

        return $this->data[$index];
    }

    public function printData(){
        $str = '';
        foreach ($this->data as $k => $v){
            $str .= "{$k} ==> {$v} \n";
        }
        $str .= "array length = {$this->length}\n";
        print_r($str);
    }
}