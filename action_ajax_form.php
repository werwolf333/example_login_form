<?php
$myArray = 
[
    [1, "Вася","one@mail.ru"], 
    [2, "Петя", "two@mail.ru"],
    [3, "Коля", "three@mail.ru"]
];

$arrayForm = array(
    'name' => $_POST["user_name"],
    'surname' => $_POST["user_surname"],
    'tel' => $_POST["user_tel"],
    'email' => $_POST["user_email"],
    'password' => $_POST["user_password"],
    'password_repeat' => $_POST["user_password_repeat"]
);

$errors = "";

if(empty($_POST["user_name"]))
{
    $errors = $errors."void user_name; ";
}
if(empty($_POST["user_surname"]))
{
    $errors = $errors."void user_surname; ";
}
if(empty($_POST["user_tel"]))
{
    $errors = $errors."void user_tel; ";
}
if(empty($_POST["user_email"]))
{
    $errors = $errors."void user_email; ";
}
if(empty($_POST["user_password"]))
{
    $errors = $errors."void user_password; ";
}
if(empty($_POST["user_password_repeat"]))
{
    $errors = $errors."void user_password_repeat; ";
}
if($_POST["user_password_repeat"]!=$_POST["user_password"])
{
    $errors = $errors."password and password_repeat does not match; ";
}
if(!preg_match('/@/', $_POST["user_email"]))
{
    $errors = $errors."invalid email; ";
}
if(!preg_match('/^\+375(25|29|33|44)/', $_POST["user_tel"]))
{
    $errors = $errors."invalid phone number; ";
}

for ($i = 0; $i < count($myArray); $i++) {
    if($myArray[$i][2] == $_POST["user_email"])
    {
        $errors = $errors."this email is busy; ";
    }
}




if(strlen($errors)==0)
{
    file_put_contents('logs.txt', PHP_EOL ."валидация прошла" .PHP_EOL, FILE_APPEND);
    foreach ($arrayForm as $key => $value)
        {
            file_put_contents('logs.txt', $key."=".$value .PHP_EOL, FILE_APPEND);
        }
}
else
{
    file_put_contents('logs.txt', PHP_EOL ."валидация не прошла" .PHP_EOL, FILE_APPEND);
    foreach ($arrayForm as $key => $value)
        {
            file_put_contents('logs.txt', $key."=".$value .PHP_EOL, FILE_APPEND);
        }
        file_put_contents('logs.txt', "errors:" .$errors .PHP_EOL .PHP_EOL, FILE_APPEND);
}
$errors = $errors." ";
echo json_encode($errors); 
