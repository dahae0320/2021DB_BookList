<?php
    $user_id = $_GET['user_id']; //GET 방식으로 등록자 id 넘겨받기
    $title ="책등록하기"; // 페이지 제목
    $name="addbook"; // 경로 이름
    require("view/$name.view.php");
?>