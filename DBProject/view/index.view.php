
<?php
    include_once('_head.php'); // 코드 중복 방지를 위한 include
?>

<!-- index 메인 내용 -->
<div class = "container">
        <br/>
        <main>
            <h3>도서 기록장</h3>
            <ul>
                <?php
                    echo $book_list;
                ?>
            </ul>
        </main>
</div>


<?php
    include_once('_tail.php'); // 코드 중복 방지를 위한 include
?>