<?php
if(get_session('login')) redirect('home');
if (route(0) == 'login') {

    if (isset($_POST['submit'])) {
        add_session('post', $_POST);
        $email = post('email');
        $password = post('password');


        $result = model('auth/login', ['email' => $email, 'password' => $password], 'login');

        if ($result['success']) {
            if(isset($result['redirect'])) {
                redirect($result['redirect']);
            }
        } else {
            add_session(
                'error',
                [
                    'message' => $result['message'] ?? '',
                    'type' => $result['type'] ?? ''
                ]
            );
        }
    }


    view('auth/login');
}

if (route(1) == 'logout') {
    session_destroy();
    redirect('login');    
}
?>