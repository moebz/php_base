<?php namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;

class RegisterController extends BaseController {

    public function registerform() {

        echo $this->blade->render( "registerform" );

    }

    public function register() {
        
        /*$errors = array();

        if ( Validator::numeric()->validate($_REQUEST['first_name']) == false ) {
            $errors[] = "First name must be numeric (for example)";
        }

        var_dump($errors);

        $user = new User;
        $user->first_name = $_REQUEST['first_name'];
        $user->last_name = $_REQUEST['last_name'];
        $user->email = $_REQUEST['email'];
        $user->password = $_REQUEST['password'];
        $user->save();

        echo "Posted!";*/

        $validationData = array(
            "first_name" => "min:3",
            "last_name" => "min:3",
            "email" => "email",
            "verify_email" => "email|equalTo:email",
            "password" => "min:3",
            "verify_password" => "equalTo:password",
        );

        $validator = new Validator;

        $errors = $validator->isValid($validationData);

        /*
        print_r($errors);
        exit();
        */

        if (sizeof($errors) > 0) {

            $_SESSION['msg'] = $errors;
            echo $this->blade->render('registerform');
            unset($_SESSION['msg']);
            exit();
            
        }

        $user = new User();
        $user->first_name = $_REQUEST['first_name'];
        $user->last_name = $_REQUEST['last_name'];
        $user->email = $_REQUEST['email'];
        $user->password = password_hash( $_REQUEST['password'], PASSWORD_DEFAULT );
        $user->save();

        echo "Posted!";

    }

    public function getShowLoginPage() {
        echo $this->blade->render( "login" );
    }

}