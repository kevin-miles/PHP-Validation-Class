<?php

class Validator {
  /*
    RULES

    min:X - min:#
    max:X - max:#
    e - email
    a - alpha
    n - numeric
    r - required
    b - truefalse (boolean)
  */
  private $errors;

  public function validate($str, $rule_input)
  {
    $this->errors = [];

    //create array from rules input
    if(isset($rule_input))
    {
      $rules = explode("," , $rule_input);
    }

    //check rules
    if(isset($rules))
    {
      $this->setErrors($str, $rules);
    }

    //return object containing rule errors and filter results
    return $this->errors;
  }

/*
  checks rules and sets errors if rule is broken
*/
  private function setErrors($str,$rules)
  {
    $errors = [];
    foreach($rules as $value)
    {
      $not_found = false;
      switch($value)
      {
        case 'e':
          $this->addError($value, $this->email($str));
          break;
        case 'a':
          $this->addError($value, $this->alpha($str));
          break;
        case 'n':
          $this->addError($value, $this->numeric($str));
          break;
        case 'r':
          $this->addError($value, $this->required($str));
          break;
        case 'b':
          $this->addError($value, $this->truefalse($str));
          break;
        default:
          $not_found = true;
          break;
      }

      //now check for the rest of the rule identifiers
      if($not_found) {
        //check for min and max here

        if(strpos($value, "min:") !== false)
        {
          $pos = strpos($value, ":"); //locate :
          $len = substr($value, $pos+1); //extract length
          $this->addError($value, $this->min($str, $len));
        }
        else if(strpos($value, "max:") !== false)
        {
            $pos = strpos($value, ":");
            $len = substr($value, $pos+1);
            $this->addError($value, $this->max($str, $len));
        }
      }
    }
  }

  private function addError($index, $str)
  {
    $this->errors[$index] = $str;
  }

  private function min($str, $len)
  {
    $result = NULL;
    if(strlen($str) < $len)
    {
      $result = " is less than the minimum length of " . $len;
    }

    return $result;
  }

  private function max($str, $len)
  {
    //GET LENGTH
    $result = NULL;

    if(strlen($str) > $len)
    {
      $result = " is more than the maximum length of " . $len;
    }

    return $result;
  }

  private function numeric($str)
  {
    $result = NULL;
    if(!is_numeric($str))
    {
      $result = " contains non-numeric characters";
    }

    return $result;
  }

  private function alpha($str)
  {
    $result = NULL;
    if(!ctype_alpha($str))
    {
      $result = " contains non-alpha characters";
    }

    return $result;
  }

  private function required($str)
  {
    $result = NULL;
    if(!isset($str) || $str == "")
    {
      return " is empty";
    }

    return $result;
  }

  private function truefalse($str)
  {
    $result = NULL;
    if($str !== "true" && $str !== "false" && $str !== "0" && $str !== "1")
    {
      return " is not a boolean value";
    }

    return $result;
  }
}

?>
