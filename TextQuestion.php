<?php

declare(strict_types=1);
require_once "Question.php"; 
require_once "Answer.php";


class TextQuestion extends Question{
    public $correctAnswers= array(); 

    // expects the correct answers combined by |, eg. "public|protected|private" 
    public function __construct(string $questionText, $answers){
        parent::__construct($questionText);
        $parts=explode('|', $answers); 
        $this->correctAnswers = $parts;
    }

    public function IsAnswerCorrect(Answer $answer): bool{
        foreach($this->correctAnswers as $correctAnswer){
            if($correctAnswer == $answer->answertext) return true; 
        }
        return false; 
    }
}