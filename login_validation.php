<?php

// define variables and set to empty values
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  
  if(file_exists('data/logins.xml')){
//     load xml file
    $xml = simplexml_load_file('data/logins.xml');
    
    //add new child element to the xml file
    $newUser = $xml->addChild("user");
    $newUser->addChild('username', $username);
    $newUser->addChild('password', $password);
    
    //save the changes
    $output = $xml->asXML();
    
    header("Location:home.html");
    
  }else{
    exit('Failed to open logins.xml');
  }
  
  file_put_contents('data/logins.xml', $xml->asXML());
}
?>