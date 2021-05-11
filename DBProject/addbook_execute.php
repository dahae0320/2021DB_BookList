<?php
    require("functions.php");
    $conn = connectDB(); //DB연결

    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $user_name = $_POST['user_name'];

    //1. user id 알아오기
    $user_id = selectUserId($conn,$user_name);

    //2. 책 정보 삽입하기
    $result = insertBookInfo($conn,$book_name,$genre,$author,$user_id);

    //3. 에러 체크
    if($result){
        echo '등록 완료'.'<script> window.close(); </script>'; 
    }else{
        echo '등록 실패'.error_log(mysqli_error($conn));
    }
?>