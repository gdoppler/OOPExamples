<?php

declare(strict_types=1); 

abstract class Question{

    public abstract function IsAnswerCorrect(Answer $answer):bool; 

    public function __construct(public $questionText)
    {
        
    }

    public function simpleDisplay(){
        echo $this->questionText; 
    }
}