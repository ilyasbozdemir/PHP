<?php


if($process == 'add') {
   
    
    if(!$data['title']) {
        return [
            'success' => false,
            'type'=> 'danger',
            'message' => 'Lütfen kategoriniz için bir başlık giriniz' 
        ];
    }
    $title = $data['title'];   

    $q = $db->prepare("INSERT INTO categories SET title=?, user_id=?");
    $q->execute([$title, get_session('id')]);
    if($q->rowCount()) {
        return [
            'success' => true,
            'type'=> 'success',
            'message' => 'Kategoriniz başarıyla eklendi.',
            'redirect' => 'category/list'
        ];
    } else {
        return [
            'success' => false,
            'type'=> 'danger',
            'message' => 'Kategoriniz eklenirken bir hata meydana geldi.'
        ];
    }


} elseif ($process == 'list') {

    $q = $db->prepare("SELECT * FROM categories WHERE user_id=?");
    $q->execute([get_session('id')]);
    if($q->rowCount()) {
        return [
            'success' => true,
            'type'=> 'success',
            'data'=> $q->fetchAll(PDO::FETCH_ASSOC)
        ];
    } else {
        return [
            'success' => true,
            'type'=> 'success',
            'data'=> []
        ];
    }
} elseif ($process == 'remove') {

    if(!$data['id']) {
        return;
    }
    
    $categoryId = $data['id'];

    $q = $db->prepare("DELETE FROM categories WHERE id=? && user_id=?");

    $q->execute([$categoryId, get_session('id')]);
    if($q->rowCount()) {
        return [
            'success' => true,
            'type'=> 'success',
            'message' => 'Kategori başarılı bir şekilde silindi.'
        ];
    } else {
        return [
            'success' => false,
            'type'=> 'danger',
            'message' => 'Kategori silinirken bir hata meydana geldi.'
        ];
    }


} elseif ($process == 'getSingle') {

    if(!$data['id']) {
        return;
    }

    $categoryId = $data['id'];

    $q = $db->prepare("SELECT * FROM categories WHERE id=? && user_id=?");

    $q->execute([$categoryId, get_session('id')]);



    if($q->rowCount()) {
        return [
            'success' => true,
            'type'=> 'success',
            'data'=> $q->fetch(PDO::FETCH_ASSOC)
        ];
    } else {
        return [
            'success' => false,
            'type'=> 'danger',
            'data' => []
        ];
    }


}elseif ($process == 'edit') {

    if(!$data['id']) {
        return;
    }

    if(!$data['title']) {
        return;
    }
    
    $categoryId = $data['id'];
    $title = $data['title'];

    


    $q = $db->prepare("UPDATE categories SET title=?, updated_date=NOW() WHERE id=? && user_id=?");

    $q->execute([$title, $categoryId, get_session('id')]);

    if($q->rowCount()) {
        return [
            'success' => true,
            'type'=> 'success',
            'message' => 'Kategoriniz başarıyla güncellendi.',
            'redirect' => 'category/list'
        ];
    } else {
        return [
            'success' => false,
            'type'=> 'danger',
            'message' => 'Kategoriniz güncellenirken bir hata meydana geldi.'
        ];
    }


}
?>