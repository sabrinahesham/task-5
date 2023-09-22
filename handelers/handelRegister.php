<?php 
session_start();
include "../core/functions.php";
include "../core/validation.php";

$errors=[];
if(checkRequestMethod("POST") && checkPostInput("name")){  

    foreach ($_POST as $key =>$value){
      $$key = sanitizeInput($value);
    }
   // $name= sanitizeInput($_POST["name"]);
   // $email=  sanitizeInput($_POST["email"]);
   // $password=  sanitizeInput($_POST["password"]);
   //echo $name ;

   if (!requiredVal($name)){
    $errors[]= "name is required";
   } else if (!minVal($name,3)){
    $errors[]=" name must be greater than 3 char";
   }else if (!maxVal($name,25)){
    $errors[]=" name must be smaller than 25 char";
    } 

    if (!requiredVal($email)){
        $errors[]= "email is required";
       } else if (!emailVal($email)){
        $errors[]=" email must be valid";
       }


       if (!requiredVal($password)){
        $errors[]= "password is required";
       } else if (!minVal($password,6)){
        $errors[]=" password must be greater than 6 char";
       }else if (!maxVal($password,20)){
        $errors[]=" password must be smaller than 20 char";
        }  

 if (empty($errors)){ 
    $users_file = fopen ("../data/users.csv","a+");
    $data=[$name,$email,sha1($password)];
     fputcsv ($users_file,$data); 
     $_SESSION["auth"]=[$name,$email] ;
     redirect ("../index.php");
     die();



    echo " tmam";
 }else {
    $_SESSION["errors"]=$errors ;
    redirect ("../register.php");
 } die;


} else {
    echo "not supported";
}