<?
	session_start();

    @extract($_POST);
	@extract($_GET);
	@extract($_SESSION); 

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>부평구문화재단-열린광장</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./common/css/sub6common.css">
    <link rel="stylesheet" href="./css/write.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="common/js/prefixfree.min.js"></script>

    <!--[if IE 9]>  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->


</head>

<body>
    
    <div class="wrap">
        <!-- 상단 header영역 -->
        <? include "../common/sub_head.html" ?>

        <div class="visual">
            <img src="./common/images/sub_visual.jpg" alt="main사진">
        </div>

        <div class="sub_menu">
            <div class="sub_inner">
                <div class="visual_text">
                    <h3>열린광장</h3>
                    <p>community</p>
                </div>
                <ul>
                    <li class="current"><a href="list.php">공지사항</a></li>
                    <li><a href="../concert/list.php">관람후기</a></li>
                    <li><a href="../sub6/sub6_3.html">자주묻는 질문</a></li>
                    <li class="last"><a href="../free/list.php">고객의 소리</a></li>
                </ul>
            </div>
        </div>

        <article id="content">
            <div class="title_area">
                <div class="title_inner">
                    <div class="line_map">
                        <span class="hidden">home</span><i class="fas fa-home"></i> &gt; 열린광장 &gt; <strong>공지사항</strong>
                    </div>
                    <h2>공지사항</h2>
                </div>
            </div>

            <div class="content_area">
                <span class="span">새 글 작성</span>
                <form  name="board_form" method="post" action="insert.php"> 
                    <div id="write_form">
                        <div class="write_line"></div>
                        <div id="write_row1">
                            <div class="col1">작성자</div>
                            <div class="col2"><?=$usernick?></div>
                            <div class="col3">
                                <label for="html_ok" class="hidden">HTML 쓰기</label>
                                <input type="checkbox" name="html_ok" id="html_ok" value="y"> HTML 쓰기
                            </div>
                        </div>
                        
                        <div class="write_line"></div>
                        <div id="write_row2">
                            <div class="col1"><label for="subject">제목</label></div>
                            <div class="col2"><input type="text" name="subject" id="subject"></div>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row3">
                            <div class="col1">내용</div>
                            <div class="col2"><textarea rows="15" cols="50" name="content"></textarea></div>
                        </div>
                        <div class="write_line"></div>
                    </div>

                    <div id="write_button">
                        <input type="submit" class="ok_btn" value="확인">&nbsp;
                        <a href="list.php?page=<?=$page?>" class="list_btn">목록</a>
                    </div>
                </form>

            
        
            </div>

        </article>

        <!-- 상단 footer영역 -->
        <? include "../common/sub_foot.html" ?>

    </div>

    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/fullnav.js"></script>

</body>
</html>

