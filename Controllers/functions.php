<?php

function checkUserName($elem){
  return (preg_match('/[A-Z]+[a-z]+[0-9]/', $elem)) ? true : false ;
}



function checkFormatMail($elem){
  return (preg_match('#^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$#', $elem)) ? true : false ;
}








