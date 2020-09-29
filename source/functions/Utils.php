<?php

function validatePhone(string $phone) : bool {
  $regex = "/\(\d{2}\)\s\d{5}\-\d{4}/";
  return preg_match($regex, $phone);
}

function validateEmail($email) : bool {
  if (filter_var($email, FILTER_VALIDATE_EMAIL))
    return true;
  return false;
}

function sanitize($str) : string {
  return filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}

function removePhoneMask($phone): string {
  return preg_replace('/[^0-9]/', '', $phone);
}

function storeFile($file) {
  $upload = new \CoffeeCode\Uploader\File(STORAGE, FILE_TYPE);
  $path_to_file =  "";
  if(validateFile($file, $upload::isAllowed()) ) {
    $path_to_file = $upload->upload($file, $file['name']);
  }
  return $path_to_file;
}

function validateFile($fileProps, $allowed) : bool {
  if(!empty($fileProps) ) {
    if( !empty($fileProps["type"]) && (in_array($fileProps["type"], $allowed)) )
      return true;
  }
  return false;
}

function getUserIpAddr() {
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    //ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    //ip pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
