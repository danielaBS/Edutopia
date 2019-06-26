<?php
$asign=  array(
  'clase' => '3'
);
$this->session->set_userdata($asign);

require  '../Edutopia/nltk/PHP-Stanford-NLP-master/autoload.php';
  $pos = new \StanfordNLP\POSTagger(
  '../Edutopia/nltk/stanford-postagger/models/spanish.tagger',
  '../Edutopia/nltk/stanford-postagger/stanford-postagger.jar'
);
$result = $pos->tag(explode(' ', "Había una vez una iguana con una chaqueta de lana."));

foreach ($result as $key ) {
  foreach ($key as $k) {
    foreach ($k as $j) {
      echo($j)."<br>";
    }
  }
}

?>
<div style="height:80px"></div>
