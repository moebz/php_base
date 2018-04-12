<?php
namespace Acme\Validation;

use Respect\Validation\Validator as Valid;

class Validator
{
    public function isValid($validation_data)
    {

        $errors = [];

        foreach ($validation_data as $name => $value) {

            // echo "validation_data: ";
            // print_r($validation_data);
            // echo "<br><br>";

            // echo "name: ";
            // print_r($name);
            // echo "<br><br>";

            // echo "value: ";
            // print_r($value);
            // echo "<br><br>";

            // print_r($_REQUEST[$name]);
            // echo "<br><br>";

            $rules = explode("|", $value);

            foreach ( $rules as $rule ) {

                $exploded = explode(":", $rule);

                // print_r($exploded);
                // echo "<br><br>";

                // exit();               

                switch ($exploded[0]) { //el primer valor siempre va a estar cargado
                    case 'min':
                        $min = $exploded[1];
                        if (Valid::stringType()->length($min)->Validate($_REQUEST[$name]) == false) {
                            $errors[] = $name . " must be at least " . $min . " characters long!";
                        }
                        break;

                    case 'email':
                        if (Valid::email()->Validate($_REQUEST[$name]) == false) {
                            $errors[] = $name . " must be a valid email!";
                        }
                        break;

                    case 'equalTo':
                        if ( Valid::equals($_REQUEST[$name])->Validate($_REQUEST[$exploded[1]])==false ) {
                            $errors[] = "$_REQUEST[$name] does not match verification value";
                        }
                        break;

                    default:
                        dd($exploded);
                        $errors[] = "No value found!";
                }//endswitch

            }//endforeach

        }//endforeach

        return $errors;

    }//endfunction

}