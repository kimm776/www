<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../lib/dbconn.php";

	if ($mode=="modify")  //수정 글쓰기면....
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
    <link rel="stylesheet" href="./css/write.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="common/js/prefixfree.min.js"></script>

    <script>
        function check_input()
        {
            if (!document.board_form.subject.value)
            {
                alert("제목을 입력하세요.");    
                document.board_form.subject.focus();
                return;
            }

            if (!document.board_form.content.value)
            {
                alert("내용을 입력하세요.");    
                document.board_form.content.focus();
                return;
            }
            document.board_form.submit();
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

                        
                
                <?
                    if($mode=="modify")
                    {

                ?>
                    <span class="span">글 수정</span>
                    <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
                <?
                    }
                    else
                    {
                ?>
                    <span class="span">새 글 작성</span>
                    <form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
                <?
                    }
                ?>
                    <div id="write_form">
                        <div class="write_line"></div>
                        <div id="write_row1">
                            <div class="col1">작성자</div>
                            <div class="col2"><?=$usernick?></div>
                        
                <?
                    if( $userid && ($mode != "modify") )
                    {
                ?>
                            <div class="col3">
                                <label for="html_ok" class="hidden">HTML 쓰기</label>
                                <input type="checkbox" name="html_ok" id="html_ok" value="y"> HTML 쓰기
                            </div>
                        
                <?
                    }
                ?>						
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row2">
                            <div class="col1"><label for="subject">제목</label></div>
                            <div class="col2"><input type="text" name="subject" id="subject" value="<?=$item_subject?>" >
                        </div>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row3">
                            <div class="col1">내용</div>
                            <div class="col2"><textarea rows="15" cols="50" name="content"><?=$item_content?></textarea></div>
                        </div>
                        <div class="write_line"></div>
                        
                        <div id="write_row4">
                            <div class="col1"><label for="upfile1">이미지파일1</label></div>
                            <div class="col2"><input type="file" id="upfile1" name="upfile[]"></div>
                        </div>
                        <div class="clear"></div>
                <? 	if ($mode=="modify" && $item_file_0)
                    {
                ?>
                        <div class="delete_ok file1"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제하기</div>
                        
                        <div class="clear"></div>
                <?
                    }
                ?>
                        <div class="write_line"></div>
                        <div id="write_row5">
                            <div class="col1"><label for="upfile2">이미지파일2</label></div>
                            <div class="col2"><input type="file" id="upfile2" name="upfile[]"></div>
                        </div>
                        
                <? 	if ($mode=="modify" && $item_file_1)
                    {
                ?>
                        <div class="delete_ok file2"><?=$item_file_1?>파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제하기</div>
                        
                        <div class="clear"></div>
                <?
                    }
                ?>
                        <div class="write_line"></div>
                        <div class="clear"></div>
                        <div id="write_row6">
                            <div class="col1"><label for="upfile3">이미지파일3</label></div>
                            <div class="col2"><input type="file" id="upfile3" name="upfile[]"></div>
                        </div>
                        
                <? 	if ($mode=="modify" && $item_file_2)
                    {
                ?>
                        <div class="delete_ok file3"><?=$item_file_2?>파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제하기</div>
                        
                        <div class="clear"></div>
                <?
                    }
                ?>
                        <div class="write_line"></div>
                        <div class="clear"></div>
                    </div>

                    <div class="line"></div>
                    <div id="write_button">
                        <input type="submit" class="ok_btn" value="확인" onclick="check_input()">&nbsp;
                        <a class="list_btn" href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
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