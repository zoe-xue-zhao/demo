<?php
/**
 * 观察者模式demo
 */

 class Theme
 {
     private $observerArr;
     public function __construct()
     {
     }
     
     /**
      * 注册观察者
      */ 
     public function register($obj){
         if( !is_object($obj) ){
             return;
         }else{
             $this->observerArr[] = $obj;
         }
     }
     
     /**
      * 遍历观察者
      */
     public function eachObserver(){
         if($this->observerArr){
             foreach ($this->observerArr as $k => $obj) {
                 $obj->output();
             }
         }
     }
 }
 
 interface echoSomething
 {
     public function output();
 }
 
 /**
  * 观察者
  */
 class Observer1 implements echoSomething
 { 
     public function output(){
         echo 'this Observer1';
     }
 }
 
 class Observer2 implements echoSomething
 {
     public function output()
     {
         echo 'this Observer2';
     }
 }
 
 $obj_theme = new Theme();
 $obj_theme->register(new Observer1());
 $obj_theme->register(new Observer2());
 $obj_theme->eachObserver();
?>