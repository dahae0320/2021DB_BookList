
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
                        <h6 class="card-subtitle mb-2 text-muted"><?= $row['author'] ?></h6> <!-- 저자 -->
                        <p class="card-text"><?= $row['genre'] ?></p> <!-- 장르 -->
                        <p class="card-text"><?= $row['read_or_not'] ?></p> <!-- 읽었음 -->
                        <p>
                            <button type="button" class="btn btn-secondary btn-sm">수정</button> <!-- 수정버튼 -->
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

</main>
<!-- 자바스크립트 영역 -->
<script type="application/javascript">
    
    function setUserValue(){ // 기능 : USER 드랍다운에 지정된 user의 Value를 등록자 input의 Value로 저장
        var userId = document.getElementById('user').value; 
        document.getElementById('user_id').setAttribute( 'value', userId );
    }
</script>

<?php
    include_once('_tail.php'); // 코드 중복 방지를 위한 include
?>