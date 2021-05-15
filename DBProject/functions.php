<?php 
    //레이아웃 뷰
    function view($name,$books,$user_list){ 
        // $name : php 경로명, $book_list : DB에서 추출한 책 데이터, $user_list : DB에서 추출한 USER 데이터
        require("view/$name.view.php");
    }

    // DB 접속 객체 얻기 함수
    function connectDB(){
        $conn = mysqli_connect("localhost","root","325264","DBProject");
        
        if(!$conn){
            echo 'DB에 연결하지 못 했습니다.'.mysqli_connect_error();
            return null;
        }else{
            return $conn;
        }
    }

    // 메인 페이지 도서 추출 함수
    function selectMainPageBook($conn){
        $sql = "SELECT b.`book_name`, b.`genre`, b.`author`, u.`user_name`, u.`user_id` FROM `book` b LEFT JOIN `user` u ON b.`user_id` = u.`user_id`";
        $result = mysqli_query($conn,$sql); 
        return $result;
    }

    // 읽은 책 페이지 도서 추출 함수
    function selectAlreadyReadPageBook($conn){
        $sql = "SELECT b.`book_name`, b.`genre`, b.`author`, u.`user_name`, br.`read_or_not`
                    FROM `book` b
                    INNER JOIN `book_read` br ON br.`book_id` = b.`book_id` and br.`read_or_not` = 1
                    LEFT JOIN `user` u ON b.`user_id` = u.`user_id`";

        $result = mysqli_query($conn,$sql);
        $list = "";
        while($row = mysqli_fetch_array($result)){
             //list는 .으로 연결된다. 
            $list = $list."<li> 책이름 : {$row['book_name']} <br/> 
                                장르 : {$row['genre']} <br/> 
                                작가 : {$row['author']} <br/> 
                                등록자 : {$row['user_name']} <br/>
                                이미 읽었음 : {$row['read_or_not']}<br/>
                            </li>";
         }
         return $list;
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

    
?>