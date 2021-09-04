<?php


namespace app\validation;


class Validation
{
    private array $rules;
    private array $errors;

    public function __construct(private $var,private $varname)
    {
    }

    public function addRule($rule)
    {
        $this->rules[] = $rule;
        return $this;
    }

    public function validate()
    {
        $this->errors = [];
        foreach ($this->rules as $rule) {
            if (!$rule->validateRule($this->var,$this->varname)){
                $this->errors[] = $rule->getErrorMessage();
                return false;
            }
        }
        return  true;
    }
    public function getErrors(){
        return $this->errors;
    }
}