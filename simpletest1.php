<?php

require 'OptionsQuestion.php';

$q1=new OptionsQuestion("Welche dieser Begriffe sind \"access modifiers\" in PHP?","public|true||protected|true||private|true||abstract|false", true); 

echo "<pre>";
//var_dump($q1);
echo "</pre>";

$q1->simpleDisplay(); 
echo "<hr/>";
// let's test all 16 combinations of true/false for the 4 option question
$tests=["true|true|true|false", "false|false|false|false"];
echo $tests[0] . $q1->isAnswerCorrect(new Answer($tests[0])) . "<br/>";
echo $tests[1] . $q1->isAnswerCorrect(new Answer($tests[1])) . "<br/>";




