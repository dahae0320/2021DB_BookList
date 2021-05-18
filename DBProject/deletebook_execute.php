<?php
    require("functions.php");
    $conn = connectDB();
    $book_id = $_GET['book_id'];
    $result = deleteBook($conn,$book_id);

    if($result){
        echo '<script> location.replace("index.php"); </script>'; 
    }else{
        echo '삭제에 실패했습니다.';
    }
?>