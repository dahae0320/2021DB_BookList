<?php
    require("functions.php");
    
    $conn = connectDB(); // DB 연결 객체 획득
    $books = selectAlreadyReadPageBook($conn); // DB에서 내가 읽은 책 페이지 책 가지고 오기
    $user_list = selectUser($conn); // DB에서 USER 드랍다운에 들어갈 USER 데이터 가지고 오기

    view('bookread',$books,$user_list); // 레이아웃 호출
    mysqli_close($conn); // DB 접속 종료
?>
