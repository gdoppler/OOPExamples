<?php

declare(strict_types=1);

// let's get the "ingredients"
require_once 'Question.php';
require_once 'Answer.php';
require_once 'AnswerOption.php';


class OptionsQuestion extends Question{
    public $options=array();

    // partial constructor property propagation
    // expects $answerOptions as combined string using | as separator 
    // example: public|true||protected|true||private|true||abstract|false
    // two || separate different options, 
    // one | separates the option text from the info if this is (part of) the correct solution

    public function __construct($questionText,string $answerOptions, public bool $isMultipleChoice=false){
        // call the base class constructor
        parent::__construct($questionText);
        $parts = explode("||", $answerOptions); 
        $index = 0; 
        
        foreach($parts as $part){
            // AnswerOption constructor takes care of a combined string
            // e.g. public|true
            $this->options[] = new AnswerOption($part,$index++);  
        }

    }

    // expects a combined string according to the answer positions true|false|true|true ... etc. 
    public function isAnswerCorrect(Answer $answer):bool{
        $allcorrect=true; 
        $parts=explode("|", $answer->answertext);
        $numOptions=count($this->options);
        // ah, did we mention Exceptions yet? 
        // they exist and are easy to use. 
        if(count($parts) != $numOptions) throw new Exception("invalid number of answer elements");
        for($x=0; $x<$numOptions; $x++){
            $useranswer = $parts[$x]=="true"; 
            if($useranswer != $this->options[$x]->isSet) return false; 
        }
        return true; 
    }

    // to override a method simply write it with the same name and parameters as in the base class
    public function simpleDisplay(){
        // having html elements here is not the most appropriate form
        // but for first tests it will serve well. 
        echo $this->questionText . "<br/>";
        foreach($this->options as $option){
            echo $option->text . "<br/>";
        } 
    }

}