<!-- 책 추가 창 열기 -->
<script type="text/javascript">
    function openChild()
    {
        var user_id = document.getElementById("user").value;
        window.open('./addbook.php?user_id='+user_id,'addbookPopup','width=400, height=200, menubar=no, status=no, toolbar=no'); 
    }
</script>

</body>
</html>