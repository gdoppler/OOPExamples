<?php

declare(strict_types=1); 

// the "heart" of our system - an abstract class
abstract class Question{

    // constructor property propagation makes $questionText a property and takes the given value
    public function __construct(public $questionText){
        
    }

    // every question type = every subclass will need to implement this
    public abstract function isAnswerCorrect(Answer $answer):bool; 

    // easiest way of question display: show the questionText
    public function simpleDisplay(){
        echo $this->questionText; 
    }

    // please note that we do have a concrete method which uses the abstract 
    // method from above. All possible. 
    // the output of a bool variable is 1 if the value == true, otherwise it is empty. 
    // so let's have some "improved" display.  
    public function showIfAnswerIsCorrect(Answer $answer):string{
        if($this->isAnswerCorrect($answer)) return "correct";
        else return "wrong"; 

        // different syntax, same effect
        // return $this->isAnswerCorrect($answer) ? "correct" : "wrong"; 
    }
}