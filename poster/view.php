<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
//table=poster & num=2 & page=1
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];  //첨부파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];    //날싸시간으로 바뀐이름 => 실제로 서브에 저장되는 파일명
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
	
	for ($i=0; $i<3; $i++) //첨부된 이미지 처리를 위한 반복문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) => 배열형태의 리턴값이 됨
            /*=> GetImageSize에서 사이즈 하나만 넘어가는것이 아니라
            파일의 너비와 높이값, 종류(jpg,png,mp4,zip,...) : 이렇게 3가지가 순서대로 넘어감*/
            
			$image_width[$i] = $imageinfo[0];  //파일너비:이미지가 안깨져야함
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 900) //첨부된 이미지의 최대 폭 너비
				$image_width[$i] = 900;
		}
		else //첨부된 이미지가 없으면 모두 null값
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
    <link rel="stylesheet" href="./common/css/sub3common.css">
    <link rel="stylesheet" href="./css/view.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="common/js/prefixfree.min.js"></script>

    <script>
        function del(href) 
        {
            if(confirm("정말 삭제하시겠습니까?")) {
                    document.location.href = href;
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
                        for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
                        {
                            if ($image_copied[$i])
                            {
                                $img_name = $image_copied[$i]; //2019_03_22_10_07_15_0.jpg
                                $img_name = "./data/".$img_name; 
                                // ./data/2019_03_22_10_07_15_0.jpg => 경로까지 더한 애가 최종으로 들어
                                $img_width = $image_width[$i];
                                
                                echo "<img src='$img_name' width='$img_width' alt='포스터 이미지'>"."<br><br>";
                            }
                        }
                        ?>
                        
                    </div>
                    <?= $item_content ?>
                </div> 

                <div id="view_button">
                    <a class="btn" href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
                    <? 
                        if($userid==$item_id || $userid=="master" || $userlevel==1 )
                        {
                    ?>
                        <a class="btn modify_btn" href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
                        <a class="btn cancel_btn" href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
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