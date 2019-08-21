<?php
require  '../Edutopia/nltk/PHP-Stanford-NLP-master/autoload.php';
  $pos = new \StanfordNLP\POSTagger(
  '../Edutopia/nltk/stanford-postagger/models/spanish.tagger',
  '../Edutopia/nltk/stanford-postagger/stanford-postagger.jar'
);

$oración = array();
$result = array();
$palabra = array();
$tagged = array();

$tags = [
  "nc00000",
  "nc0n000",
  "nc0p000",
  "nc0s000",
  "np00000",
  "va00000",
  "vag0000",
  "vaic000",
  "vaif000",
  "vaii000",
  "vaip000",
  "vais000",
  "vam0000",
  "van0000",
  "vap0000",
  "vasi000",
  "vasp000",
  "vmg0000",
  "vmic000",
  "vmif000",
  "vmii000",
  "vmip000",
  "vmis000",
  "vmm0000",
  "vmn0000",
  "vmp0000",
  "vmsi000",
  "vmsp000",
  "vsg0000",
  "vsic000",
  "vsif000",
  "vsii000",
  "vsip000",
  "vsis000",
  "vsm0000",
  "vsn0000",
  "vsp0000",
  "vssf000",
  "vssi000",
  "vssp000",
];


$verbRec = $_POST['verbo'];
$sustRec = $_POST['sustantivo'];
$textRecov = $_POST['palabra'];

$resultDos = array();
array_push($resultDos, explode(' ', $verbRec));


foreach ($textRecov as $key){
  array_push($oración, explode('.', $key));
}

foreach ($oración as $key){
  foreach ($key as $k){
    array_push($result, $pos->tag(explode(' ', $k)));
  }
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

foreach ($tagged as $ind => $key) {
  for($i=0; $i<sizeof($tags); $i++){
    if ($key===$tags[$i]){
      echo $palabra[$ind]."<br />";
    }
  }
}

echo "==============================<br />";
echo "All Data Submitted Successfully!";

?>

<script type="text/javascript">
    alert("There are " + "gola" + " cart items.");
</script>
