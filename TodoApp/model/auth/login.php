<?php


if($process == 'login') {
    
    if(!$data['email']) {
        return [
            'success' => false,
            'type'=> 'danger',
            'message' => 'Lütfen eposta adresinizi giriniz' 
        ];
    }

    if(!$data['password']) {
        return [
            'success' => false,
            'type'=> 'danger',
            'message' => 'Lütfen şifresinizi giriniz' 
        ];
    }
    
    $email = $data['email'];
    $password = $data['password'];



    $q = $db->prepare("SELECT *, CONCAT(name, ' ' , surname) AS fullname FROM users WHERE email=? && password=?;");
    $q->execute([$email, md5($password)]);
    if($q->rowCount()) {
        $user = $q->fetch(PDO::FETCH_ASSOC);
        add_session('id', $user['id']);
        add_session('name', $user['name']);
        add_session('surname', $user['surname']);
        add_session('email', $user['email']);
        add_session('fullname', $user['fullname']);
        add_session('login', true);
        return [
            'success' => true,
            'type'=> 'success',
            'data' => $user,
            'message' => 'Giriş başarılı',
            'redirect' => 'home'
        ];
    } else {
        return [
            'success' => false,
            'type'=> 'danger',
            'message' => 'Eposta adresiniz veya şifreniz hatalı'
        ];
    }


}
?>