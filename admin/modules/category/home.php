<?php 
	require_once __DIR__. "/../../autoload/autoload.php";

    $open = "category";

    $id = intval(getInput('id'));
    

    $editcategory = $db->fetchID("category", $id);
    if(empty($editcategory)){

    	$SESSION['error'] = 'Dữ liệu không tồn tại';
    	redirectAdmin("category");
    }

    $home =$editcategory['home'] ==0 ? 1:0;

    $id_update = $db->update("category", array("home" => $home), array("id" => $id));

    if($id_update > 0){

        $_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin("category");
    }

   else{
        // them that bai
        // s
        $_SESSION['error'] = "Dữ liệu không đổi";
        redirectAdmin("category");
    }


 ?>
