<?php
    function insertBookInfo($state,$book_id){
        $sql = "INSERT INTO `book_read`(`read_or_not`, `book_id`) VALUES ($state, $book_id)";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    if( !empty($_POST['state'] ) {
        $sql = "INSERT INTO `book_read`(`read_or_not`, `book_id`) VALUES ($state, $book_id)";
        $result = mysqli_query($conn,$sql);
    }
?>