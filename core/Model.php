<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    //  public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'exists';
    public const RULE_ALPHA_NUMERICAL = 'alpha_numerical';
    public const RULE_ALPHABETICAL = 'alphabetical';
    public $jsonStorage;
    public $stored_users = [];
    public array $errors = [];

    public function loadData($data)
    {
        // if User property,  property{$key} == property{$value}
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function setjsonData()
    {
        $this->jsonStorage = __DIR__ . '/../data.json';
        $this->stored_users = json_decode(
            file_get_contents($this->jsonStorage),
            true
        );
    }

    public function isUserUnique(array $array, string $user)
    {
        foreach ($array as $value) {
            if ($user == $value['login']) {
                return true;
            } else {
                return false;
            }
        }
    }

    abstract public function rules(): array;

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            //var_dump(  $value );

            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                // var_dump($ruleName);
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addErrorForRule($attribute, self::RULE_REQUIRED);
                }

                if (
                    $ruleName === self::RULE_ALPHA_NUMERICAL &&
                    !preg_match('/^\S*(?=\S*[\d])(?=\S*[a-z])\S*$/', $value)
                ) {
                    $this->addErrorForRule(
                        $attribute,
                        self::RULE_ALPHA_NUMERICAL
                    );
                }
                if (
                    $ruleName === self::RULE_ALPHABETICAL &&
                    !preg_match('/^[a-zA-Z ]+$/', $value)
                ) {
                    $this->addErrorForRule($attribute, self::RULE_ALPHABETICAL);
                }
                if (
                    $ruleName === self::RULE_UNIQUE &&
                    $this->isUserUnique(
                        $this->stored_users,
                        $this->{$rule['value']}
                    )
                ) {
                    $this->addErrorForRule($attribute, self::RULE_UNIQUE);
                }

                if ($ruleName === self::RULE_UNIQUE) {
                    $this->setjsonData();
                    if (
                        $this->isUserUnique(
                            $this->stored_users,
                            $this->{$rule['value']}
                        )
                    ) {
                        $this->addErrorForRule($attribute, self::RULE_UNIQUE);
                    }
                }

                if (
                    $ruleName === self::RULE_MIN &&
                    strlen($value) < $rule['min']
                ) {
                    $this->addErrorForRule($attribute, self::RULE_MIN, $rule);
                }
                if (
                    $ruleName === self::RULE_MATCH &&
                    $value !== $this->{$rule['match']}
                ) {
                    $this->addErrorForRule($attribute, self::RULE_MATCH, $rule);
                }
            }
        }

        return empty($this->errors);
    }

    private function addErrorForRule($attribute, $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';

        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message); //    self::RULE_MIN => 'min lenght must be {min}',
        }
        $this->errors[$attribute][] = $message;
    }

    public function addError($attribute, $message)
    {
        $this->errors[$attribute][] = $message;
        // var_dump( $this->errors);
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This is a required field',
            // self::RULE_EMAIL => 'This field must be a vaild email address',
            self::RULE_MIN => ' Min lenght must be {min}',
            self::RULE_UNIQUE => 'A user with this detail already exists',
            self::RULE_ALPHA_NUMERICAL =>
            '  Must contain both alphabets and numbers',
            self::RULE_ALPHABETICAL => ' Must contain only alphabets',
            self::RULE_MATCH => 'Must match with the password field',
            'login' => ' No registered users with this login',
            'password' => 'Password is incorrect',
        ];
    }

    public function geterrors($attribute)
    {
        //     $errors = [];
        //     foreach ($this->errors as $key => $value) {
        //         if ($key == $attribute) {
        //             array_push($errors, $value);
        //         }
        //     }

        //    // var_dump($errors);

        //     if( $errors)
        //     {
        //      foreach ($this->rules() as $k => $rules) {
        //         foreach ($rules as $rule) {
        //             $ruleName = $rule;
        //             if (!is_string($ruleName)) {
        //                 $this->ruleName = $rule[0];
        //             }
        //             switch ($ruleName) {
        //                 case self::RULE_MATCH:
        //                     $errors[0][1];
        //                     break;
        //                 case self::RULE_MIN:
        //                      $errors[0][1];
        //                     break;
        //                 case self::RULE_REQUIRED:
        //                     //echo json_encode( $errors[0][0]);
        //                     $errors[0][0];
        //                     break;
        //                 case self::RULE_EMAIL:
        //                     return $errors[0][1];
        //                     break;
        //             }
        //      }

        //          }
        //     }

        //    // var_dump($errors);
        //    //  var_dump($errors);
        //           var_dump($this->errors);
    }
}
