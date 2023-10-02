<?php
require_once 'Answer.php';

declare(strict_types=1);

class OptionsQuestion extends Question{
    public AnswerOption $options= array();

    public bool $isMultipleChoice; 

    public function __construct($questionText,string $answerOptions, bool $isMultipleChoice=false)
    {
        parent::__construct($questionText);
        $parts = explode("||",$answerOptions); 
        $index = 1; 
        foreach($parts as $part){
            $options[] = new AnswerOption($part,$index++);  
        }

    }

    public function isAnswerCorrect(Answer $answer):bool{
        foreach($answer->answeroptions as $option){

        }
        return true; 
    }

}