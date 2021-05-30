
<?php
    include_once('_head.php'); // 코드 중복 방지를 위한 include
?>

<!-- index 메인 내용  -->
<main>
    <div class= "container mt-5">
        <div class="row">
            
            <!-- 책 카드 출력 구간 -->
            <?php
                while($row = mysqli_fetch_array($books)){ // DB에서 가지고 온 레코드들을 배열 형태로 변환 후, 한 레코드 씩 $row 변수에 저장하기
            ?>
            <div class="col-lg-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['book_name'] ?></h5> <!-- 책 제목 -->
                        <p style="position: absolute; right: 0; margin-right: 20px;">💙</p>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $row['author'] ?></h6> <!-- 저자 -->
                        <p class="card-text"><?= $row['genre'] ?></p> <!-- 장르 -->
                        <p class="card-text" style="display:none;">읽었음!<?= $row['read_or_not'] ?></p> <!-- 읽었음 -->
                        <p id="bookId" name="bookId" style="display:none;"><?= $row['book_id'] ?></p> <!-- book_id -->
                        <p>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#updateBook" value="<?= $row['book_id'] ?>" onclick="getBookValue(this.value);">수정</button> <!-- 수정버튼 -->
                            <button type="button" class="btn btn-secondary btn-sm">삭제</button> <!-- 삭제버튼 -->
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

    <!-- 책 수정 모달 영역 -->
    <div class="modal" id ="updateBook" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">책 수정하기</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- 책 등록 form 영역 -->
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
                            <!-- 등록 버튼 클릭 시, setUserValue() 함수 호출 -->
                            <button type="submit" class="btn btn-primary" onclick="setBookValue();"> 등록 </button> 
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> 취소 </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

</main>
<!-- 자바스크립트 영역 -->
<script type="application/javascript">
    var bookId;

    function getBookValue(value){
        bookId = value;
        console.log(bookId);
    }
    
    function setBookValue(){ // 기능 : book_id의 value를 수정 부분의 책 등록 번호 input의 Value로 저장
        document.getElementById('book_id').setAttribute('value', bookId);
    }
</script>

<?php
    include_once('_tail.php'); // 코드 중복 방지를 위한 include
?>