<?php
    class MyArray {
        private $length = 0;
        private $cap = 0;
        private $data = [];
        
        public function __construct($len) {
            $len = intval($len);
            if($len >= 0) {
                $this->cap = $len;
            }else {
                return null;
            }
        }
        
        private function checkIdx($idx) {
            $idx = intval($idx);
            
            if($idx < 0 || $idx >= $this->length) {
                return false;
            }else {
                return true;
            }
        }
        
        private function checkFull() {
            return $this->length == $this->cap;
        }
        
        public function insert($idx, $num) {
            if($this->checkFull()) {
                return 2;   //满了
            }
            
            for($i = $this->length; $i > $idx; $i--) {
                $this->data[$i] = $this->data[$i - 1];
            }
            
            $this->data[$idx] = intval($num);
            $this->length++;
            
            return 0;
        }
        
        public function delete($idx) {
            if(!$this->checkIdx($idx)) {
                return [1, null];
            }
            
            $delData = $this->data[$idx];
            
            for($i = $idx; $i < $this->length - 1; $i++) {
                $this->data[$i] = $this->data[$i + 1];
            }
            
            $this->length--;
            
            return [0, $delData];
        }
        
        public function find($idx) {
            if(!$this->checkIdx($idx)) {
                return [1, null];
            }
            
            return [0, $this->data[$idx]];
        }
        
        public function printData() {
            $str = '';
            for ($i = 0; $i < $this->length; $i++) {
                $str .= '|' . $this->data[$i];
            }
            echo "{$str}\n";
        }
    }