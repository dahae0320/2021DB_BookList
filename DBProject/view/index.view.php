
<?php
    include_once('_head.php');
?>

<div class = "container">

    <main>
        <br/>
        <h3>도서 기록장</h3>
        <input type="button" value="추가" onclick="window.open('./addbook.php','addbookPopup','width=400, height=200, menubar=no, status=no, toolbar=no');">

        <ul>
            <?php
                echo $list;
            ?>
        </ul>
    </main>
</div>

<?php
    include_once('_tail.php'); 
?>