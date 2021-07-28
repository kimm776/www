<? 
	session_start(); 
	$table = "poster";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>부평구문화재단-열린광장</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./common/css/sub3common.css">
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
       $scale=6; 			// 한 화면에 표시되는 글 수
	}

    if ($mode=="search")
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
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
                    <h3>공연&middot;예매</h3>
                    <p>performance reservation</p>
                </div>
                <ul>
                    <li><a href="../sub3/sub3_1.html">공연일정</a></li>
                    <li><a href="../sub3/sub3_2.html">예매안내</a></li>
                    <li class="current last"><a href="list.php">공연검색</a></li>
                </ul>
            </div>
        </div>

        <article id="content">
            <div class="title_area">
                <div class="title_inner">
                    <div class="line_map">
                        <span class="hidden">home</span><i class="fas fa-home"></i> &gt; 공연&middot;예매 &gt; <strong>공연검색</strong>
                    </div>
                    <h2>공연검색</h2>
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
                    <?		
                    for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
                    {
                        mysql_data_seek($result, $i);       
                        // 가져올 레코드로 위치(포인터) 이동  
                        $row = mysql_fetch_array($result);       
                        // 하나의 레코드 가져오기
                        
                        $item_num     = $row[num];
                        $item_id      = $row[id];
                        $item_name    = $row[name];
                        $item_nick    = $row[nick];
                        $item_hit     = $row[hit];
                        $item_date    = $row[regist_day];
                        $item_date = substr($item_date, 0, 10);  
                        $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

                        if(!$row[file_copied_0]){
                            $thum_img = './data/default.jpg'; 
                        }else{
                            $thum_img =$row[file_copied_0];  //첫번째 업로드된 이미지 파일  2021_07_22_11_00_35_0.jpg
                            $thum_img = './data/'.$thum_img;  //   ./data/2021_07_22_11_00_35_0.jpg
                        }
                    ?>
                    <div class="list_item">
                       <div class="list_box">
                            <div class="list_item1">
                                <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                                    
                                    <span class="img"><img src="<?=$thum_img?>" alt="포스터 이미지"></span>
                                    <span class="title"><?= $item_subject ?></span>
                                </a>
                            </div>

                            <div class="bot">
                                <div class="list_item4"> <?= $item_date ?></div>
                                <div class="list_item5"><i class="far fa-eye"></i> <?= $item_hit ?></div>
                            </div>
                            
                       </div>
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
                                echo "<a href='list.php?table=$table&page=$i&scale=$scale'> $i </a>";
                            }      
                    }
                    ?>			
                    <i class="fas fa-chevron-right"></i></div>
                    <div id="button">
                        <a class="list_btn" href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
                        <? 
                            if($userlevel==1 || $userid=="master")
                            {
                        ?>
                                <a class="write_btn" href="write_form.php?table=<?=$table?>">글쓰기</a>
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