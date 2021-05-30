
<?php
    include_once('_head.php'); // 코드 중복 방지를 위한 include

?>

<!-- index 메인 내용  -->
<main>
    <div class= "container mt-5">
        <div class="row">
            <!-- 책 등록 버튼 -->
            <div class="col-lg-12 mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBook">+ New Book</button> 
            </div>
            <!-- 책 카드 출력 구간 -->
            <?php
                $array_for_row = array(); //배열 생성
                $index = 0; // 인덱스 기록
                while($row = mysqli_fetch_array($books)){ // DB에서 가지고 온 레코드들을 배열 형태로 변환 후, 한 레코드 씩 $row 변수에 저장하기
                    array_push($array_for_row, $row); // 배열 만들기
            ?>
            <div class="col-lg-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                            <h5 class="card-title" ><?= $row['book_name'] ?></h5> <!-- 책 제목 -->
                            <p id="bookId" name="bookId" style="display:none;" value="<?= $row['book_id'] ?>"></p> <!-- book_id -->

                            <select onchange="fetchReadData(this.value, this.name);" id="read_or_not" style="position: absolute; right: 0; margin-right: 20px;" name="<?= $row['book_id'] ?>">
                                <option id="nothing">🤍</option>     <!-- 기본 -->
                                <option id="wanna_read" value="0">❤️</option>     <!-- 읽고 싶은 책(book wanna read) -->
                                <option id="already_read" value="1">💙</option>     <!-- 이미 읽은 책(book read) -->
                            </select>

                            <h6 class="card-subtitle mb-2 text-muted" ><?= $row['author'] ?></h6> <!-- 저자 -->
                            <p class="card-text" ><?= $row['genre'] ?></p> <!-- 장르 -->
                            <p>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#updateBook" value="<?= $row['book_id'] ?>" onclick="getBookValue(this.value);">수정</button> <!-- 수정버튼 -->
                            <?php
                                echo '<button class="btn btn-secondary btn-sm" value='.$row['book_id'].' onclick="deleteBook(this.value)">삭제</button>' //삭제버튼 
                            ?>
                                <label class="card-text">&nbsp&nbsp'<?=$row['user_name']?>'님이 등록</label> <!-- 등록자 -->
                            </p>
                    </div>
                </div>
            </div>
            <?php
                } // while문 끝
            ?>
        </div>   
    </div>

    <!-- 책 등록 모달 include -->
    <div class="modal" id ="addBook" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">책 등록하기</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- 책 등록 form 영역 -->
                    <form action="./addbook_execute.php" method="post">
                        <div class="modal-body"> <!-- modal body -->                    
                            <div class="mb-3"> <!-- 책 제목 입력 -->
                                <label for="bookname" class="col-form-label">책 제목 :</label> 
                                <input type="text" class="form-control" id="book_name" name="book_name">
                            </div>
                            <div class="mb-3"> <!-- 저자 입력 -->
                                <label for="author" class="col-form-label">저자 :</label>
                                <input type="text" class="form-control" id="author" name="author">
                            </div>
                            <div class="mb-3"> <!-- 장르 입력 -->
                                <label for="genre" class="col-form-label">장르 :</label>
                                <select class="form-select" id="genre" name="genre">
                                    <option value="소설">소설</option>
                                    <option value="자기계발서">자기계발서</option>
                                    <option value="인문">인문</option>
                                </select>
                            </div>
                            <input type="hidden" id="user_id" name="user_id"/> <!-- 등록자 input -->
                            </div>
                        <div class="modal-footer">  <!-- modal footer --> 
                            <!-- 등록 버튼 클릭 시, setUserValue() 함수 호출 -->
                            <button type="submit" class="btn btn-primary" onclick="setUserValue()" > 등록 </button> 
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> 취소 </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    <!-- 책 수정 모달 영역 -->
    <div class="modal" id ="updateBook" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">책 수정하기</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- 책 수정 form 영역 -->
                    <form action="./updatebook_execute.php" method="post">
                        <div class="modal-body"> <!-- modal body -->                    
                            <div class="mb-3"> <!-- 책 제목 입력 -->
                                <label for="booknameUp" class="col-form-label">책 제목 :</label> 
                                <input type="text" class="form-control" id="booknameUp" name="book_name">
                            </div>
                            <div class="mb-3"> <!-- 저자 입력 -->
                                <label for="authorUp" class="col-form-label">저자 :</label>
                                <input type="text" class="form-control" id="authorUp" name="author">
                            </div>
                            <div class="mb-3"> <!-- 장르 입력 -->
                                <label for="genreUp" class="col-form-label">장르 :</label>
                                <select class="form-select" id="genreUp" name="genre">
                                    <option value="소설">소설</option>
                                    <option value="자기계발서">자기계발서</option>
                                    <option value="인문">인문</option>
                                </select>
                            </div>
                            <input type="hidden" id="book_id" name="book_id"/> <!-- 책 등록 번호 input -->
                            </div>
                        <div class="modal-footer">  <!-- modal footer --> 
                            <!-- 등록 버튼 클릭 시, setBookValue() 함수 호출 -->
                            <button type="submit" class="btn btn-primary" onclick="setBookValue();"> 등록 </button> 
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> 취소 </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

</main>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- 자바스크립트 영역 -->
<script type="application/javascript">
    var bookId;
    
    // 기능 : USER 드랍다운에 지정된 user의 Value를 등록자 input의 Value로 저장
    function setUserValue(){ 
        var userId = document.getElementById('user').value; 
        document.getElementById('user_id').setAttribute( 'value', userId );
    }
    // 기능 : 삭제 php 문서로 이동(GET 방식)
    function deleteBook(value){ 
        location.replace("./deletebook_execute.php?value="+value);
    }

    function getBookValue(value){
        bookId = value;
        console.log(bookId);
    }
    
    function setBookValue(){ // 기능 : book_id의 value를 수정 부분의 책 등록 번호 input의 Value로 저장
        document.getElementById('book_id').setAttribute('value', bookId);
    }

    // 읽었는지 안읽었는지 하트 선택 시 데이터 전송        
    function fetchReadData(state, book_id){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
        $.ajax({                        /* THEN THE AJAX CALL */
            type: "POST",               /* TYPE OF METHOD TO USE TO PASS THE DATA */
            url: "read_or_not.php",     /* PAGE WHERE WE WILL PASS THE DATA */
            data: {state, book_id},     /* THE DATA WE WILL BE PASSING */
            success: function(result){  /* GET THE TO BE RETURNED DATA */
                console.log("읽음 상태 : "+state); 
                console.log("책 등록 넘버 : "+book_id);
            }
        });
        // alert("상태가 변경되었습니다.");
        // location.reload();
    }

</script>

<?php
    include_once('_tail.php'); // 코드 중복 방지를 위한 include
?>