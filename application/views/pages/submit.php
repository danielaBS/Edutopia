<?php
require  '../Edutopia/nltk/PHP-Stanford-NLP-master/autoload.php';
  $pos = new \StanfordNLP\POSTagger(
  '../Edutopia/nltk/stanford-postagger/models/spanish.tagger',
  '../Edutopia/nltk/stanford-postagger/stanford-postagger.jar'
);

$tags = [
  "nc00000", "nc0n000", "nc0p000", "nc0s000", "np00000",
  "va00000", "vag0000", "vaic000", "vaif000", "vaii000",
  "vaip000", "vais000", "vam0000", "van0000", "vap0000",
  "vasi000", "vasp000", "vmg0000", "vmic000", "vmif000",
  "vmii000", "vmip000", "vmis000", "vmm0000", "vmn0000",
  "vmp0000", "vmsi000", "vmsp000", "vsg0000", "vsic000",
  "vsif000", "vsii000", "vsip000", "vsis000", "vsm0000",
  "vsn0000", "vsp0000", "vssf000", "vssi000", "vssp000",
];


$oracion = array();
$result = array();
$palabra = array();
$tagged = array();
$index = array();
$indexToTag = array();
$indexesToTag = array();
$resultVerb = array();
$resultSust = array();
$frase = array();
$promedio = 0;

$verbRec = $_POST['verbo'];
$sustRec = $_POST['sustantivo'];
$textRecov = $_POST['palabra'];

$resultVerb = explode(' ', $verbRec);
$resultSust = explode(' ', $sustRec);

foreach ($textRecov as $key){
  array_push($oracion, explode('. ', $key));
}

foreach ($oracion as $key){
  foreach ($key as $k){
    array_push($frase, $k);
  }
}

foreach ($resultVerb as $verb) {
  for($i=0; $i<sizeof($frase); $i++){
  //  echo "verb " . " oración: " . $frase[$i] . "  Palabra:" . $verb . "<br />";
    if (strpos($frase[$i], $verb, 0) !== false) {
      array_push($indexesToTag, $i);
    }
  }
}

foreach ($resultSust as $sust) {
  for($j=0; $j<sizeof($frase); $j++){
  //  echo "sust " . " oración: " . $frase[$j] . "  Palabra:" . $sust . "<br />";
    if (strpos($frase[$j], $sust, 0) !== false) {
      array_push($indexesToTag, $j);
    }
  }
}


for($i=0; $i<sizeof($indexesToTag); $i++){
  if(!in_array($indexesToTag[$i], $indexToTag)){
    array_push($indexToTag, $indexesToTag[$i]);
  }
}

foreach ($indexToTag as $key) {
  array_push($result, $pos->tag(explode(' ', $frase[$key])));
}


foreach ($result as $key) {
  foreach ($key as $k) {
    foreach ($k as $l) {
      foreach ($l as $m => $n) {
        if(is_integer($m/2)){
          array_push($palabra, $n);
        }else{
          array_push($tagged, $n);
        }
      }
    }
  }
}

foreach ($tagged as $ind => $val) {
  for($i=0; $i<sizeof($tags); $i++){
    if ($val===$tags[$i]){
      array_push($index, $ind);
    }
  }
}

foreach ($index as $key) {
  for($i=0; $i<sizeof($resultVerb); $i++){
    if($resultVerb[$i] === $palabra[$key]){
      $promedio = $promedio+1;
    }
  }
  for($j=0; $j<sizeof($resultSust); $j++){
    if($resultSust[$j] === $palabra[$key]){
      $promedio = $promedio+1;
    }
  }
}

echo ($promedio/sizeof($palabra))*100;

if($promedio>5){
  echo "<script> sendData($promedio); </script>";
}

echo "==============================<br />";
echo "Has identificado " . $promedio . " sustantivos y verbos. ¡Continúa así!";

?>
