<?php


namespace app\validation\rules;


interface ValidationRule
{

    public  function validateRule($value,$varname);
    public function getErrorMessage();
}