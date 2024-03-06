<?php
function countingWords($numberOfWords,$retrieving,$checkIfDots){
    //Counts words and stops after 4 words
    $words = explode(' ', $retrieving);
    $chunksOfWords = implode(' ', array_slice($words, 0, $numberOfWords));

    //Checks if it is necessary to place '...'
    if($checkIfDots && count($words) > $numberOfWords ){
        echo "<p>" . $chunksOfWords . " ... </p>";
    }else{
        echo $chunksOfWords;
    }
}

?>