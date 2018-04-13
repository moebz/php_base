<?php namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Acme\Email\SendEmail;
use Acme\models\UserPending;

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

        //dd($_REQUEST);

        $errors = [];

        $validationData = array(
            "first_name" => "min:3",
            "last_name" => "min:3",
            "email" => "email|unique:User",
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

        //echo "Posted!";

        //dd($user);

        $token = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true));

        $user_pending = new UserPending;
        $user_pending->token = $token;
        $user_pending->user_id = $user->id;
        $user_pending->save();

        $message = $this->blade->render('emails.welcomeemail', ['token' => $token]);
        SendEmail::sendEmail($user->email, "Welcome to Acme", $message);

        header("Location: /success");
        exit();

    }

    public function getVerifyAccount() {

        $user_id = 0;
        $token = $_GET['token'];

        // look up the token
        $user_pending = UserPending::where('token', '=', $token)->get();

        foreach($user_pending as $item) {
            $user_id = $item->user_id;
        }

        if ($user_id > 0) {
            // make the user account active
            $user = User::find($user_id);
            $user->active = 1;
            $user->save();

            UserPending::where('token', '=', $token)->delete();

            header("Location: /account-activated");

            exit();

        } else {

            header("Location: /page-not-found");
            exit();

        }

    }

    public function getShowLoginPage() {
        echo $this->blade->render( "login" );
    }    

}