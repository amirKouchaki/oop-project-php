<?php


namespace app\validation\rules;


use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\Types\This;

class MinimumChar implements ValidationRule
{
    private $varname;
    public function __construct(private int $minimum)
    {
    }

    public function validateRule($value,$varname)
    {
        $this->varname = $varname;
        if(strlen($value)<$this->minimum){
            return false;
        }
        return true;
    }


    public function getErrorMessage():string
    {
        return  $this->varname.' should at least have '.$this->minimum.' characters.';
    }
}