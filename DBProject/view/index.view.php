
<?php
    include_once('_head.php'); // 코드 중복 방지를 위한 include
?>

<!-- index 메인 내용  -->
<main>
    <div class= "container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBook">+ New Book</button> 
            </div>
            <?php
                while($row = mysqli_fetch_array($books)){
            ?>
            <div class="col-lg-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['book_name'] ?></h5> 
                        <h6 class="card-subtitle mb-2 text-muted"><?= $row['author'] ?></h6>
                        <p class="card-text"><?= $row['genre'] ?></p>
                        <p>
                            <button type="button" class="btn btn-secondary btn-sm">수정</button>
                            <button type="button" class="btn btn-secondary btn-sm">삭제</button>
                            <label class="card-text">&nbsp&nbsp'<?=$row['user_name']?>'님이 등록</label>
                        </p>

                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>   
    </div>
    <!-- 모달 영역 -->
    <div class="modal" id ="addBook" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">책 등록하기</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="./addbook_execute.php" method="post">
                        <div class="modal-body">                       
                            <div class="mb-3">
                                <label for="bookname" class="col-form-label">책 제목 :</label>
                                <input type="text" class="form-control" id="book_name" name="book_name">
                            </div>
                            <div class="mb-3">
                                <label for="author" class="col-form-label">저자 :</label>
                                <input type="text" class="form-control" id="author" name="author">
                            </div>
                            <div class="mb-3">
                                <label for="genre" class="col-form-label">장르 :</label>
                                <select class="form-select" id="genre" name="genre">
                                    <option value="소설">소설</option>
                                    <option value="자기계발서">자기계발서</option>
                                    <option value="인문">인문</option>
                                </select>
                            </div>
                            <input type="hidden" id="user_id" name="user_id"/>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" onclick="setUserValue();" > 등록 </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> 취소 </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</main>

<script type="application/javascript">
    var userId = document.getElementById('user').value; 

    function isMine(user_id){
        if(userId == user_id){
            return true;
        }else{
            return false;
        }
    }

    function setUserValue(){
        document.getElementById('user_id').setAttribute( 'value', userId );
    }
</script>

<?php
    include_once('_tail.php'); // 코드 중복 방지를 위한 include
?>