<?
	session_start();

    @extract($_POST);
	@extract($_GET);
	@extract($_SESSION); 

    
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);       
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];
	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}
	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
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

    <!--[if IE 9]>  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->

    <script>
        function check_input() //덧글 필수입력 처리
        {
            if (!document.ripple_form.ripple_content.value)
            {
                alert("내용을 입력하세요.");    
                document.ripple_form.ripple_content.focus();
                return;
            }
            document.ripple_form.submit();
        }

        function del(href) 
        {
            if(confirm("정말 삭제하시겠습니까?")) {
                    document.location.href = href;
            }
        }
    </script>
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
                    <li><a href="../greet/list.php">공지사항</a></li>
                    <li><a href="../concert/list.php">관람후기</a></li>
                    <li><a href="../sub6/sub6_3.html">자주묻는 질문</a></li>
                    <li class="last current"><a href="list.php">고객의 소리</a></li>
                </ul>
            </div>
        </div>

        <article id="content">
            <div class="title_area">
                <div class="title_inner">
                    <div class="line_map">
                        <span class="hidden">home</span><i class="fas fa-home"></i> &gt; 열린광장 &gt; <strong>고객의 소리</strong>
                    </div>
                    <h2>고객의 소리</h2>
                </div>
            </div>

            <div class="content_area">

                <div id="view_title">
                    <div id="view_title1"><?= $item_subject ?></div>
                    <div id="view_title2">
                        <div class="people"><i class="fas fa-user-alt"></i></div>
                        <div class="nick_date">
                            <div><?= $item_nick ?></div>     
                            <div><?= $item_date ?></div>  
                        </div>
                        <div class="eye"><i class="far fa-eye"></i> <?= $item_hit ?></div>   
                    </div>	
                </div>

                <div id="view_content">
                    <div class="img_box">
                        <?
                            for ($i=0; $i<3; $i++)
                            {
                                if ($image_copied[$i])
                                {
                                    $img_name = $image_copied[$i];
                                    $img_name = "./data/".$img_name;
                                    $img_width = $image_width[$i];
                                    
                                    echo "<img src='$img_name' width='$img_width' alt='질문 이미지'>"."<br><br>";
                                }
                            }
                        ?>
                    </div>
                    <?= $item_content ?>
                </div>

                            <div id="ripple">
                                <span>댓글</span>
                                <?
                                    $sql = "select * from free_ripple where parent='$item_num'";
                                    $ripple_result = mysql_query($sql); //메인글의 덧글 검색 

                                    while ($row_ripple = mysql_fetch_array($ripple_result))
                                    {
                                        $ripple_num     = $row_ripple[num];
                                        $ripple_id      = $row_ripple[id];
                                        $ripple_nick    = $row_ripple[nick];
                                        $ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
                                        $ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
                                        $ripple_date    = $row_ripple[regist_day];
                                ?>
                                <div id="ripple_writer_title">
                                    
                                    <ul class="writer_ul">
                                        <li id="writer_title1"><i class="fas fa-user-circle"></i> <?=$ripple_nick?></li>
                                        <li id="writer_title2"><?=$ripple_date?></li>
                                        <li id="writer_title3"> 
                                            <? 
                                                    if($userid=="master" || $userid==$ripple_id)
                                                    echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제하기]</a>"; 
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div id="ripple_content"><?=$ripple_content?></div>
                                <div class="hor_line_ripple"></div>
                    <?
                            }
                    ?>			
                    
                                <form class="ripple_form" name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>"> 
                                
                                    <div id="ripple_box">
                                        <div id="ripple_box2">
                                            <span class="nick"><i class="fas fa-user-circle"></i><?=$usernick?></span>
                                            <textarea rows="5" cols="65" name="ripple_content"></textarea>
                                        </div>
                                        <div id="ripple_box3"><a href="#" onclick="check_input()">등록</a></div>
                                    </div>
                                </form>
                            </div> <!-- end of ripple -->

                            <div id="view_button">
                                    <a class="btn"  href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
                    <? 
                        if($userid && ($userid==$item_id))
                        {
                    ?>
                            <a class="btn cancel_btn" href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
                            <a  class="btn modify_btn" href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
                                    
                    <?
                        }
                    ?>
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