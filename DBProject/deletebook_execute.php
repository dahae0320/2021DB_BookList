<?php
    require("functions.php");
    $conn = connectDB();
    $book_id = $_GET['value']; // book_id 넘기기
    $result = deleteBook($conn,$book_id);

    if($result){
        echo '<script>location.replace("index.php");</script>'; 
    }else{
        echo '삭제에 실패했습니다.';
    }

    mysqli_close($conn); // DB 접속 종료

?>