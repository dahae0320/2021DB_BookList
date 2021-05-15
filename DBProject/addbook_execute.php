<?php
    require("functions.php"); // 함수 import
    $conn = connectDB(); //DB연결

    //POST 방식으로 받은 데이터 변수에 저장하기
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $user_id = $_POST['user_id'];

    //1. 책 정보 삽입하기
    $result = insertBookInfo($conn,$book_name,$genre,$author,$user_id);

    //2. SQL 처리 체크
    if($result){
        echo '<script> location.replace("index.php"); </script>'; 
    }else{
        echo '등록 실패'.error_log(mysqli_error($conn));
    }

    mysqli_close($conn); // DB 접속 종료

?>