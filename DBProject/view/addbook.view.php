<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h2> 책 등록하기 </h2>
<form action="./addbook_execute.php" method="post">
    <label for="bookname"> 책 제목 : </label>
    <input type="text" id="book_name" name="book_name">
    <br/>
    <label for="author"> 저자 : </label>
    <input type="text" id="author" name="author">
    <br/>
    <label for="genre"> 장르 : </label>
    <select id="genre" name="genre">
        <option value="소설">소설</option>
        <option value="자기계발서">자기계발서</option>
        <option value="인문">인문</option>
    </select>
    <br/>
    <input type="radio" name="read" value="읽었어요">읽었어요</input>
    <input type="radio" name="wannaread" value="읽고싶어요">읽고싶어요</input>
    <input type="hidden" name="user_name" value="Alice">
    <br/>
    <input type="submit" value="등록하기" />
</form>

</body>
</html>