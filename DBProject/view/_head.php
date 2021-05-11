<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?> </title>

    <style>
        nav ul li{
            display : inline;
            border-left:1px solid #999;             /* 각 메뉴의 왼쪽에 "|" 표시(분류 표시) */
            font:bold 12px Dotum;                     /* 폰트 설정 - 12px의 돋움체 굵은 글씨로 표시 */
            padding:0 10px;                         /* 각 메뉴 간격 */
        }
    </style>
</head>
<body>
    <header>
        <h2><?= $title ?></h2>
        <nav>
            <ul id="menu">    
                <li><a href = "../DBProject/index.php"> 메인 페이지 </a></li>
                <li><a href = "../DBProject/bookread.php" > 내가 읽은 책 </a></li>
                <li><a href = "../DBProject/bookwannaread.php"> 읽고 싶은 책 </a></li>
            </ul>
        </nav>
    </header>