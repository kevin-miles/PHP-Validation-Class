<?php

require_once 'validator.php';

$validate = new Validator(); //create validate object using Validator blueprint

var_dump($validate->validate("abcdefg", "r,min:3,max:6,n,a")); //dump a validation check

?>
