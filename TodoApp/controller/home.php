<?php
if(!get_session('login')) redirect('login');

if(route(0) == 'home') {
    view('home/home', ['name' => 'Enver', 'surname' => 'ASLAN']);
}
?>