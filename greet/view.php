<? 
	session_start();
	
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	/*
		$_SESSION['userid']
		$_SESSION['username']
		$_SESSION['usernick']
		$_SESSION['userlevel']

		$num=1
        $page=1
	*/

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
    <link rel="stylesheet" href="./css/view.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="common/js/prefixfree.min.js"></script>

    <script>
        function del(href) 
        {
            if(confirm("정말 삭제하시겠습니까?")) {
                    document.location.href = href; //'delete.php?num=1'
            }
        }
    </script>

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

                
                <div id="view_title">
                    <div id="view_title1"><span>제목</span><?= $item_subject ?></div>
                    <div id="view_title2">
                        <div><span>작성자</span><?= $item_nick ?></div>     
                        <div><span>작성일</span><?= $item_date ?></div>  
                        <div><span>조회수</span><?= $item_hit ?></div>   
                    </div>	
                </div>

                <div id="view_content">
                    <?= $item_content ?>
                </div>

                <div id="view_button">
                    <a class="btn" href="list.php?page=<?=$page?>">목록</a>&nbsp;
                    <? 
                        if($userid==$item_id || $userlevel==1 || $userid=="master")
                        {
                    ?>
                            <a class="btn cancel_btn" href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
                            <a class="btn modify_btn" href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
                    <?
                        }
                    ?>

                    <!-- <? 
                        if($userlevel==1 || $userid=="master")
                        {
                    ?>
                            <a class="btn write_btn" href="write_form.php">글쓰기</a>
                    <?
                        }
                    ?> -->
                </div>


            
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
