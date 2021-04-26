<?php

class Calc {
    private int $num1;
    private int $num2;


    public function __construct($num1, $num2){
        $this->num1 = $num1;
        $this->num2 = $num2; 
    }

    public function plus(){
        return $this->num1 + $this->num2; 
    }

    public function minus(){
        return $this->num1 - $this->num2;
    }

    public function multi(){
        return $this->num1 * $this->num2;
    }

    public function div(){

        if($this->num1 == 0 or $this->num2 == 0){
            throw new Exception("You cant divide nothing for 0");
        }else{
            return $this->num1 / $this->num2; 
        }
        
    }

    public function modulus(){
        return $this->num1 % $this->num2;
    }

    public function exp(){
        return pow($this->num1, $this->num2);
    }

    
}