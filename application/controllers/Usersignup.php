<?php

use Google\Client as GoogleClient;
use Google\Auth\Oauth2;

class Usersignup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
        $this->load->model('usersignup_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function signup()
    {
        $this->load->view('signup_form');
    }
    public function submit()
    {
        if ($this->input->post('signup')) {

            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[signup.email]', array('is_unique' => 'Email already Exists'));
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('signup_form');
            } else {
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['password'] = $this->input->post('password');
                $response = $this->usersignup_model->store($data);
                if ($response == true) {
                    echo "Signup Success!  ";
                } else {
                    echo "Signup Failed!";
                }
            }
        }
    }
    public function login()
    {
        if ($this->session->has_userdata('id')) {
            redirect('../Usersignup/dashboard');
        }
        $this->load->view('login_form');
    }
    public function userLogin()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_form');
        } else {
            $email  = $this->input->post('email');
            $password  = $this->input->post('password');
            if ($user = $this->usersignup_model->getuser($email)) {
                if ($user->password == $password) {
                    echo 'Login Success </br>';
                    $this->session->set_userdata('id', $user->id);
                    $this->session->set_userdata('name', $user->name);
                    redirect('../Usersignup/dashboard');
                } else {
                    echo 'Login Error!!!';
                    //redirect('../Usersignup/userLogin');
                }
            } else {
                $data['error'] = 'Invalid username or password';
                $this->load->view('login_form', $data);
            }
        }
    }
    public function dashboard()
    {
        if ($this->session->has_userdata('id')) {
            $this->load->view('dashboard');
        } else {
            redirect('../Usersignup/login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        redirect('../Usersignup/login');
    }
    public function changePassword()
    {
        if ($this->session->has_userdata('id')) {
            $this->load->view('changepassword');
        } else {
            redirect('../Usersignup/login');
        }
    }
    public function changeUserPassword()
    {
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
        // , array('matches' => 'Old password and New Password are not Same')
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('changepassword');
        } else {
            $old_password  = $this->input->post('old_password');
            $new_password  = $this->input->post('new_password');
            $confirm_password  = $this->input->post('confirm_password');
            if (strcmp($old_password, $new_password) == 0) {
                $data['message'] = "Old password and New Password is Same";
            } else {
                $id = $this->session->userdata('id');
                if ($this->usersignup_model->oldPasswordCheck($id, $old_password)) {
                    $this->usersignup_model->changePassword($id, $new_password);
                    $this->session->set_flashdata('success_message', 'Your password Change  successfully .');
                    redirect('../Usersignup/dashboard');
                } else {
                    $data['message'] = "Old password is Worng";
                }
            }

            $this->load->view('changepassword', $data);
        }
    }

    public function forgotPassword()
    {
        $this->load->view('forgotpassword');
    }
    public function resetPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('forgotpassword');
        } else {
            $email = $this->input->post('email');
            if ($user = $this->usersignup_model->resetPassword($email)) {
                $to = $email;
                $subject = 'Password';
                $password = 'Your Password is : ' . $user->passord;
                $header = 'From:ajish@gmail.com\r\n';
                mail($to, $subject, $password, $header);
                $this->session->set_flashdata('message', 'Email has been send!. Please Check your mailbox');
                redirect('../Usersignup/login');
            } else {
                $this->session->set_flashdata('message', ' No User with this email exist!');
                redirect('../Usersignup/forgotpassword');
            }
        }
    }
    public function googleLogin()
{
    $google = new GoogleClient();
    $google->setApplicationName('Ajish google Login');
    $google->setClientId('275634547791-gkl81l4ogo1mgurc3hsqmh8abjpkkm94.apps.googleusercontent.com');
    $google->setClientSecret('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');
    $google->setRedirectUri('http://localhost/php/codeigniter/Usersignup/googleLogin');
    $google->addScope(['https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile']);

    if ($code = $this->input->get('code')) {
        $token = $google->fetchAccessTokenWithAuthCode($code);
        $google->setAccessToken($token);

        $config = [
            'clientId' => '275634547791-gkl81l4ogo1mgurc3hsqmh8abjpkkm94.apps.googleusercontent.com',
            'clientSecret' => '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',
            'redirectUri' => 'http://localhost/php/codeigniter/Usersignup/googleLogin',
            'scope' => ['https://www.googleapis.com/auth/userinfo.profile', 'https://www.googleapis.com/auth/userinfo.email']
        ];

        $oauth = new Google\Auth\OAuth2($config);
        $oauth->setAccessToken($token['access_token']);

        $service = new Google\Service\Oauth2($google);
        $user_info = $service->userinfo->get();
        $data['name'] = $user_info->name;
        $data['email'] = $user_info->email;
        $data['image'] = $user_info->picture;

        $this->usersignup_model->googlelogin($data);
        $user = $this->usersignup_model->getuser($user_info->email);
        $this->session->set_userdata('user', $user);
        redirect('../Usersignup/dashboard');
    } else {
        $url = $google->createAuthUrl();
        header('Location:' . filter_var($url, FILTER_SANITIZE_URL));
    }
}

}
