<?php


namespace app\validation\rules;


class MaximumChar implements ValidationRule
{

    private $varname;
    public function __construct(private int $maximum)
    {
    }

    public function validateRule($value,$varname)
    {
        $this->varname = $varname;
        if(strlen($value)>$this->maximum){
            return false;
        }
        return true;
    }
    public function getErrorMessage():string
    {
        return $this->varname.' should be maximum of '.$this->maximum.' characters.';
    }
}