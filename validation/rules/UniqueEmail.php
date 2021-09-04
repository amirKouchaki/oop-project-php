<?php


namespace app\validation\rules;


class UniqueEmail implements ValidationRule
{

    public function validateRule($value,$varname)
    {

    }

    public function getErrorMessage():string
    {
        return 'email is already taken';
    }
}