<?php
    require("functions.php");

    $state = $_POST['state'];
    $book_id = $_POST['book_id'];
    $conn = connectDB(); // DB 연결 객체 획득
    $read_or_not = choiceBookRead($conn, $state, $book_id);  // DB에서 책 읽었는지 안읽었는지 상태 저장
    mysqli_close($conn);

?>