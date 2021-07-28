<? 
	session_start(); 
	/*
    $_SESSION['userid']
    $_SESSION['username']
    $_SESSION['usernick']
    $_SESSION['userlevel']
	*/
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
    <link rel="stylesheet" href="./css/list.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="common/js/prefixfree.min.js"></script>

    <!--[if IE 9]>  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
<?
    @extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	if (!$scale){
	    $scale=10;			// 한 화면에 표시되는 글 수
	}
    if ($mode=="search")  //검색을 했을때
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요.');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else   //처음 레코드를 읽어올때 (검색하지 않았을때)
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;     //읽어올 레코드의 인덱스 번호 

	$number = $total_record - $start;   //출력할 일련번호의 시작값
?>

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

                <div class="content_inner">
                    
                    <div class="scale_list">
                        <select name="scale" onchange="location.href='list.php?scale='+this.value">
                            <option value=''>글 개수</option>
                            <option value='5'>5개씩</option>
                            <option value='10'>10개씩</option>
                            <option value='15'>15개씩</option>
                            <option value='20'>20개씩</option>
                        </select>
                        <div class="total">TOTAL : <span><?= $total_record ?></span> &nbsp;/ </div>
                        <div class="total">PAGE : <span><?= $page ?></span></div>
                    </div>
                    
                        
                    <form class="form" name="board_form" method="post" action="list.php?mode=search"> 
                        <div class="list_search">
                            <div class="list_search3">
                                <select name="find">
                                    <option value='subject'>제목</option>
                                    <option value='content'>내용</option>
                                    <option value='nick'>작성자</option>
                                </select>
                            </div>
                            <div class="list_search4">
                                <label for="search" class="hidden">검색박스</label>
                                <input type="text" id="search" name="search" placeholder="검색어를 입력해주세요.">
                            </div>
                            <div class="list_search5">
                                <label for="search_btn" class="hidden">검색하기</label>
                                <input type="submit" id="search_btn" name="search_btn" value="검색">
                            </div>
                        </div>
                    </form>
                </div>


                <div id="list_content">
                    <div id="list_top_title">
                        <ul>
                            <li id="list_title1">NO.</li>
                            <li id="list_title2">제목</li>
                            <li id="list_title3">작성자</li>
                            <li id="list_title4">작성일</li>
                            <li id="list_title5">조회수</li>
                        </ul>
                    </div>
    <?		
    for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
    {
        mysql_data_seek($result, $i);       
        // 가져올 레코드로 위치(포인터) 이동  
        $row = mysql_fetch_array($result);       
        // 하나의 레코드 가져오기
        
        $item_num     = $row[num]; //게시판번호(삭제/수정/글보기)
        $item_id      = $row[id];
        $item_name    = $row[name];
        $item_nick    = $row[nick];
        $item_hit     = $row[hit];

        $item_date    = $row[regist_day];   //2021-07-21 (10:32)
        $item_date = substr($item_date, 0, 10);  //2021-07-21

        $item_subject = str_replace(" ", "&nbsp;", $row[subject]); //문자열을 바꾸는 메소드

    ?>
                <div class="list_item">
                    <div class="list_item1"><?= $number ?></div>
                    <div class="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
                    <div class="list_item3"><?= $item_nick ?></div>
                    <div class="list_item4"><?= $item_date ?></div>
                    <div class="list_item5"><?= $item_hit ?></div>
                </div>
    <?
        $number--;
    }
    ?>
                <div id="page_button">
                    <div id="page_num"> <i class="fas fa-chevron-left"></i>
    <?
    // 게시판 목록 하단에 페이지 링크 번호 출력
    for ($i=1; $i<=$total_page; $i++)
    {
            if ($page == $i)     // 현재 페이지 번호 링크 안함
            {
                echo "<b> $i </b>";
            }
            else
            { 
                echo "<a class='page_btn' href='list.php?page=$i&scale=$scale'> $i </a>";
            }      
    }
    ?>			
                <i class="fas fa-chevron-right"></i></div>
                    <div id="button">
                        
                        <a class="list_btn" href="list.php?page=<?=$page?>">목록</a>&nbsp;
                        
    <? 
        if($userlevel==1 || $userid=="master")  //관리자로 로그인이 된 상태라면
        {
    ?>
                        <a class="write_btn" href="write_form.php?page=<?=$page?>">글쓰기</a>
    <?
        }
    ?>
                    </div>
                </div> <!-- end of page_button -->
            
            </div> <!-- end of list content -->



                
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