<?php

declare(strict_types=1); 

abstract class Question{

    public abstract function isAnswerCorrect(Answer $answer):bool; 

    public function __construct(public $questionText){
        
    }

    public function simpleDisplay(){
        echo $this->questionText; 
    }

    public function showIfAnswerIsCorrect(Answer $answer):string{
        if($this->isAnswerCorrect($answer)) return "correct";
        else return "wrong"; 
    }
}