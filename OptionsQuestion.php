<?php

declare(strict_types=1);
require_once 'Question.php';
require_once 'Answer.php';
require_once 'AnswerOption.php';


class OptionsQuestion extends Question{
    public $options=array();

    public bool $isMultipleChoice; 

    public function __construct($questionText,string $answerOptions, bool $isMultipleChoice=false)
    {
        parent::__construct($questionText);
        $parts = explode("||", $answerOptions); 
        $index = 0; 
        
        foreach($parts as $part){
            $this->options[] = new AnswerOption($part,$index++);  
        }

    }

    // expects a combined string according to the answer positions true|false|true|true ... etc. 
    public function isAnswerCorrect(Answer $answer):bool{
        $allcorrect=true; 
        $parts=explode("|", $answer->answertext);
        $numOptions=count($this->options);
        if(count($parts) != $numOptions) throw new Exception("invalid number of answer elements");
        for($x=0; $x<$numOptions; $x++){
            $useranswer = $parts[$x]=="true"; 
            if($useranswer != $this->options[$x]->isSet) return false; 
        }
        return true; 
    }

    public function simpleDisplay(){
        echo $this->questionText . "<br/>";
        foreach($this->options as $option){
            echo $option->text . "<br/>";
        } 
    }

}