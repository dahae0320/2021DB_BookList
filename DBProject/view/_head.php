<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 도서기록장 </title>
    
    <!-- 부트스트랩 링크 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <style>
        #nav_page{
            font-size: 15px;
            margin-left :50px;
        }
       

    </style>
</head>
<body>
    <header>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">도서기록장</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                <!-- 메인 페이지, 내가 읽은 책 페이지, 일고 싶은 책 페이지 탭 -->
                <ul class="navbar-nav nav-tabs">
                    <li class="nav-item" id="nav_page">
                    <a class="nav-link active" aria-current="page" href="../DBProject/index.php">메인 페이지</a>
                    </li>
                    <li class="nav-item" id="nav_page">
                    <a class="nav-link" href="../DBProject/bookread.php">내가 읽은 책</a>
                    </li>
                    <li class="nav-item" id="nav_page">
                    <a class="nav-link" href="#">읽고 싶은 책</a>
                    </li>
                </ul>
                 <!-- User 드랍다운  -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" id="nav_user">
                        <select class="form-select" id="user" name="user">
                                        <?php
                                            echo $user_list;
                                        ?>
                        </select>
                    </li>
                    <li class="nav-item">
                        <div class="navbar-text">&nbsp님, 안녕하세요 </div>
                    <li>
                </ul>
                </div>
            </div>
            </nav>
    </header>