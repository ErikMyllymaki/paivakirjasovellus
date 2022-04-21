<?php


function logout(){

    try{
        session_unset();
        session_destroy();
    }catch(Exception $e){
        throw $e;
    }
}