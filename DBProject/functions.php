<?php 
    //레이아웃 뷰
    function view($name,$books,$user_list){ 
        // $name : php 경로명, $book_list : DB에서 추출한 책 데이터, $user_list : DB에서 추출한 USER 데이터
        require("view/$name.view.php");
    }

    // DB 접속 객체 얻기 함수
    function connectDB(){
        $conn = mysqli_connect("localhost","root","48088943aa","dbproject");
        
        if(!$conn){
            echo 'DB에 연결하지 못 했습니다.'.mysqli_connect_error();
            return null;
        }else{
            return $conn;
        }
    }

    // 메인 페이지 도서 추출 함수
    function selectMainPageBook($conn){
        $sql = "SELECT b.`book_name`, b.`genre`, b.`author`, u.`user_name`, u.`user_id`, b.`book_id` FROM `book` b LEFT JOIN `user` u ON b.`user_id` = u.`user_id`";
        $result = mysqli_query($conn,$sql); 
        return $result;
    }

    // 사용자가 읽고 싶어하는 도서 추출
    function sel_WannaReadBook($conn) {
        $sql = "SELECT book.book_name, book.genre, book.author, user.user_name, book_status.wanna 
        FROM book 
        INNER JOIN book_status ON book.book_id = book_status.book_id
        AND book_status.wanna = 1 
        LEFT JOIN user ON book.user_id = user.user_id";

        $result = mysqli_query($conn, $sql);
        return $result;
    }

    // USER 드랍다운에 들어갈 USER 데이터 추출 함수
    function selectUser($conn){
        $sql = "SELECT `user_name`,`user_id` FROM `user`";
        $result = mysqli_query($conn,$sql);
        $list = "";

        while($row = mysqli_fetch_array($result)){
            $list = $list."<option value = {$row['user_id']} > {$row['user_name']} </option>";
        }
        return $list;
    }

    // 책 등록 함수
    function insertBookInfo($conn,$book_name,$genre,$author,$user_id){
        $sql = "INSERT INTO `book`(`book_name`,`genre`,`author`,`user_id`) VALUES ('$book_name','$genre','$author',$user_id)";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    // 책 수정 함수
    function updateBookInfo($conn,$book_name,$genre,$author,$book_id){
        // update
        $sql = "UPDATE book SET book_name='$book_name', genre='$genre', author='$author' WHERE book_id = $book_id";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    
?>