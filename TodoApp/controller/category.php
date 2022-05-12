<?php


if (!get_session('login')) redirect('login');
if (route(0) == 'category' && !route(1)) {
    /*
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
*/

    view('categories/home');
} elseif (route(0) == 'category' && route(1) == 'add') {

    if (post('submit')) {
        $title = post('title');

        $result = model('categories', ['title' => $title], 'add');

        if ($result['success']) {
            if (isset($result['redirect'])) {
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
    view('categories/add');
} elseif (route(0) == 'category' && route(1) == 'edit' && is_numeric(route(2))) {
    
    if (post('submit')) {
        $title = post('title');
        $id = post('id');

        $result = model('categories', ['id'=>$id,'title' => $title], 'edit');

        if ($result['success']) {
            if (isset($result['redirect'])) {
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
    
    $result = model('categories', ['id' => route(2)], 'getSingle');
    view('categories/edit', $result['data']);

} elseif (route(0) == 'category' && route(1) == 'list') {

    $result = model('categories', [], 'list');
    view('categories/list', $result['data']);

} elseif (route(0) == 'category' && route(1) == 'remove' && is_numeric(route(2))) {
    $result = model('categories', ['id' => route(2)], 'remove');

    redirect('categories/list');
}
?>