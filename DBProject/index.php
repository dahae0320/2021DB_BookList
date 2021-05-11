<?php 
    require("functions.php");
    
    $title = "읽고 싶은 페이지";
    $conn = connectDB(); // DB 연결
    $list = selectMainPageBook($conn); // DB에서 메인페이지 책 가지고 오기

    view('index',$title,$list); // 인덱스 View 출력
    mysqli_close($conn);
?>