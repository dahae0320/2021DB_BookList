<?php 
    require("functions.php");
    
    $title = "메인 페이지"; // 페이지 제목
    $conn = connectDB(); // DB 연결 객체 획득
    $book_list = selectMainPageBook($conn); // DB에서 메인페이지 책 가지고 오기
    $user_list = selectUser($conn); // DB에서 USER 드랍다운에 들어갈 USER 데이터 가지고 오기

    view('index',$title,$book_list,$user_list); // 레이아웃 호출
    mysqli_close($conn); // DB 접속 종료
?>