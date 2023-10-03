<?php
declare(strict_types=1);

// can be used to define the correct answer options of an OptionQuestion or to define the answer(s) given to be checked
class AnswerOption{
    
    public string $text;
    public bool $isSet; 

    // expects a combined string in the format [optiontext]|[true/false]
    public function __construct(string $optionAndIsSet, public int $position)
    {
        $parts=explode("|",$optionAndIsSet); 
        $this->text=$parts[0]; 
        $this->isSet=$parts[1]=="true"; 
    }
}