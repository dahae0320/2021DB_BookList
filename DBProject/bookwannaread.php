<?php
    require("functions.php");
    
    $conn = connectDB(); // DB 연결
    $books = sel_WannaReadBook($conn); // 읽고싶은 책 목록
    $user_list = selectUser($conn); // DB에서 USER 드랍다운에 들어갈 USER 데이터 가지고 오기

    view('bookwannaread',$books,$user_list); // 레이아웃 호출
    mysqli_close($conn); // DB 접속 종료
?>