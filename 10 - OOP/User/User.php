<?php

    class User
    {
        private static $lastId;


        public function setPassword($password){
            if (!preg_match("/[0-9]+/", $password)){
                throw new Exception("Password should contain digits");
            }
            if (!preg_match("/[0-9]+/", $password)){
                throw new Exception("Password should contain digits");
            }
        }
    }