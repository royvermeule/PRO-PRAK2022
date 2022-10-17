<?php

class Auth extends Controller {

    public function __construct()
    {
        $this->model('User');
    }

    public function index() {
        $this->view('homepages/index');
    }

    public function login() {
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];

        $usr = new User();
        $user = $usr->getByEmail($email);
        var_dump($user);
        var_dump($email);

        // Check if the user is found. If not, means the Email is probably wrong or doesnt exist.
        if($user == false) {
            header('Location: /');
            return;
        }

        // Check if the password is correct.
        if(!password_verify($password, $user->password)) {
            header('Location: /test');
            return;
        }

        $_SESSION['user'] = $user;
        switch($user->userrole) {
            case 'superuser':
                header('Location: /dashboard/admin');
                break;
            case 'magazijnbeheerder':
                header('Location: /dashboard/magazijnbeheerder');
                break;
            case 'financieelbeheerder':
                header('Location: /dashboard/financieelbeheerder');
                break;
            case 'docent':
                header('Location: /dashboard/docent');
                break;
            case 'student':
                header('Location: /dashboard/student');
                break;
            default:
                header('Location: /success');
                break;
        }
    }
}