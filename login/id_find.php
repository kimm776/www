<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>부평구문화재단-아이디찾기</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/id_find.css">

<script src="https://kit.fontawesome.com/f8a0f5a24e.js" crossorigin="anonymous"></script>
<script src="../common/js/jquery-1.12.4.min.js"></script>
<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
<script>
	$(document).ready(function() {

         $(".find").click(function() {    // id입력 상자에 id값 입력시
            var name = $('#name').val(); //홍길동
            var hp1 = $('#hp1').val(); //010
            var hp2 = $('#hp2').val(); //0000
            var hp3 = $('#hp3').val(); //0000

            $.ajax({
                type: "POST",
                url: "find.php", 
                data: "name="+ name+ "&hp1="+hp1+ "&hp2="+hp2+ "&hp3="+hp3,  /*매개변수id도 같이 넘겨줌*/
                cache: false, 
                success: function(data) /*이 메소드가 완료되면 data라는 변수 안에 echo문이 들어감*/
                {
                     $("#loadtext").html(data); /*span안에 있는 태그를 사용할것이기 때문에 html 함수사용*/
                }
            });
             
        }); 

    });
</script>
</head>
<body>
    <div id="wrap">
        <h1><a href="../index.html" class="logo">부평구문화재단</a></h1>
        <p class="text"><i class="fas fa-exclamation-circle"></i> 기존에 입력된 정보와 같아야 아이디를 찾을 수 있습니다.</p>
        <div id="col2">
            <form name="find" method="get" action="find.php"> 
            
                <h2>아이디찾기</h2>
                
                <div id="login_form">
                    <div class="clear"></div>

                    <div id="login2">
                        <div id="id_input_button">
                            <fieldset>
                                <div class="top">
                                    <span>이름</span>
                                    <input type="text" name="name" class="find_input" id="name" placeholder="이름 (ex. 홍길동)">
                                </div>
                                
                                <div class="bot">
                                    <span>휴대폰</span>
                                    <label class="hidden" for="hp1">연락처 앞3자리</label>
                                    <select name="hp1" id="hp1" title="휴대폰 앞3자리를 선택하세요." class="find_input">
                                        <option>010</option>
                                        <option>011</option>
                                        <option>016</option>
                                        <option>017</option>
                                        <option>018</option>
                                        <option>019</option>
                                    </select> ㅡ
                                    <label class="hidden" for="hp2">연락처 가운데 4자리</label>
                                    <input class="find_input" type="text" id="hp2" name="hp2" title="연락처 가운데 4자리를 입력하세요." maxlength="4" placeholder="(ex. 0000)"> ㅡ
                                    <label class="hidden" for="hp3">연락처 마지막 4자리</label>
                                    <input class="find_input" type="text" id="hp3" name="hp3" title="연락처 마지막 4자리를 입력하세요." maxlength="4" placeholder="(ex. 0000)">
                                </div>
                                <span id="loadtext"></span>
                                <div class="btn">
                                    <input type="button" value="아이디찾기" class="find">
                                    <a href="login_form.php">돌아가기</a>
                                </div>
                                <p class="go">비밀번호를 잊으셨나요?<a href="pw_find.php">비밀번호 찾기</a></p>
                            </fieldset>

                            
                        </div>
                        <div class="clear"></div>
                        
                        <div id="login_line"></div>
                    </div>			 
                </div> <!-- end of form_login -->

            </form>
        </div> <!-- end of col2 -->

    </div> <!-- end of wrap -->
</body>
</html>