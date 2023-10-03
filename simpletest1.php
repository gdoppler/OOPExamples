<?php

require_once 'OptionsQuestion.php';
require_once 'TextQuestion.php';

$q1=new OptionsQuestion("Welche dieser Begriffe sind \"access modifiers\" in PHP?","public|true||protected|true||private|true||abstract|false", true); 

echo "<pre>";
//var_dump($q1);
echo "</pre>";

$q1->simpleDisplay(); 
echo "<hr/>";
// let's test some examples
$tests=["true|true|true|false", "false|false|false|false"];
echo $tests[0] . " should be correct and is -> [" . $q1->showIfAnswerIsCorrect(new Answer($tests[0])) . "]<br/>";
echo $tests[1] . " should be wrong and is -> [" . $q1->showIfAnswerIsCorrect(new Answer($tests[1])) . "]<br/>";
echo "<hr";
// let's test all 16 combinations of true/false for the 4 option question
for($x=0;$x<16;$x++){
    $o1=$x & 1 ? "true": "false"; 
    $o2=$x & 2 ? "true": "false"; 
    $o4=$x & 4 ? "true": "false"; 
    $o8=$x & 8 ? "true": "false"; 
    $test = $o8 . "|" . $o4 . "|" . $o2 . "|" . $o1; 

    echo $test . " -> [" . $q1->showIfAnswerIsCorrect(new Answer($test)) . "]<br/>"; 

}
echo "<hr/>";
// now for the textquestion
$q2=new TextQuestion("Nenne einen der access modifiers in PHP: ", "public|protected|private");
$q2->simpleDisplay();
echo "<hr/>";

$tests=["public","protected","private","abstract","new","class","function"];
foreach($tests as $test){
    echo $test . " -> [" . $q2->showIfAnswerIsCorrect(new Answer($test)) . "]<br/>";
}

