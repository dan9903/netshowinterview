<?php

require __DIR__. '/vendor/autoload.php';
require __DIR__. "/source/config/Config.php";

use \Source\Models\Candidate;

include __DIR__. "/assets/vendor/header.php";

$candidate = new Candidate(
  "Damian Meneses",
  "menesesd2@live.com",
  "71997124690",
  "espero ser contratado pela netshowme",
  "storage/files",
  "10.0.0.106",
);

echo "<pre>";
  print_r($candidate->find());
echo "</pre>";

include __DIR__. "/assets/vendor/footer.php";


