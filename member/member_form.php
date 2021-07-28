<? 
	session_start(); 
    
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>부평문화재단 회원가입</title>
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="css/member_form.css">
	<script src="https://kit.fontawesome.com/2d56222f57.js" crossorigin="anonymous"></script>
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	
	
    <script>
    //영문,숫자
    function check_input2(){
        tvalue = document.member_form.id;
        onvalue = tvalue.value;

        count=0;
        for (i=0;i<onvalue.length;i++){
            ls_one_char = onvalue.charAt(i); 

            if(ls_one_char.search(/[0-9|a-z|A-Z|]/) == -1) { 
            count++;
            }
        }
        if(count!=0) { 
            alert("아이디에는 영문과 숫자만 사용가능합니다.\n다시 입력해주세요.") ;
            tvalue.value = "";
            tvalue.focus();
            return false;
        }
     }   
    </script>

    <script>
        //핸드폰 숫자
        function check_input3(){
            hvalue = document.member_form.hp2;
            honvalue = hvalue.value;

            count=0;
            for (i=0;i<honvalue.length;i++){
                hls_one_char = honvalue.charAt(i); 

                if(hls_one_char.search(/[0-9]/) == -1) { 
                count++;
                }
            }
            if(count!=0) { 
                alert("휴대폰 번호를 다시 입력해주세요.") ;
                hvalue.value = "";
                hvalue.focus();
                return false;
            }
        }   

        //핸드폰 숫자2
        function check_input4(){
            hvalue2 = document.member_form.hp3;
            honvalue2 = hvalue2.value;

            count=0;
            for (i=0;i<honvalue2.length;i++){
                hls_one_char2 = honvalue2.charAt(i); 

                if(hls_one_char2.search(/[0-9]/) == -1) { 
                count++;
                }
            }
            if(count!=0) { 
                alert("휴대폰 번호를 다시 입력해주세요.") ;
                hvalue2.value = "";
                hvalue2.focus();
                return false;
            }
        } 
    </script>

	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시 
     //(.keyup-> 바로확인가능하게)
    var id = $('#id').val(); //aaa value 가져오는 함수

    $.ajax({
        type: "POST", // get, post
        url: "check_id.php", // 중복검사 처리되는 php 파일 경로
        data: "id="+ id, // 넘어가는 ? 뒤의 값 (?id=aaa)
        cache: false, // 캐시 남기지 말것
        success: function(data) //위의 처리가 완료되면 
        {
             $("#loadtext").html(data); //#loadtext에 check_id.php의 내용 출력
            //스크립트에서 ajax쓸때는 data란 매개변수 넣어줘야 한다. 
            //success의 data 란 변수 안에 check_id.php에서 처리된 값이 들어간다.
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
    </script>
	<script>
    function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (document.member_form.name.value.length<2)
      {
          alert("2글자 이상의 이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value)
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.hp2.focus();
          return;
      }

      if (!document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.hp3.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      if (!document.member_form.email1.value) 
      {
          alert("이메일을 입력하세요");    
          document.member_form.email1.focus();
          return;
      }
      if (!document.member_form.email2.value) 
      {
          alert("이메일을 입력하세요");    
          document.member_form.email2.focus();
          return;
      }
      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
   
   function join_cancel(){
   history.go(-2);
   }
</script>
</head>
<body>
	 
        
    <div id="content"> 
        <div class="inner_wrap">
            <form  name="member_form" method="post" action="insert.php">
                <h1 class="logo">
                    <a href="../index.html">부평구문화재단</a>
                </h1>
                <h2 class="hidden">회원가입</h2>
                <ul class="join_notice">
                    <li>가입시 입력한 아이디는 변경이 불가능합니다.</li>
                    <li>모든 항목은 <span>필수항목</span>입니다.</li>
                </ul> 
                <ul class="list_wrap">
                    <li class="form_row">
                        <ul>
                            <li class="tit">
                                <label for="id">아이디</label>
                            </li>
                            <li>
                                <input type="text" name="id" id="id" required onkeyup="check_input2()" placeholder="아이디를 입력해주세요 (영문/숫자만 사용가능)">
                                <span id="loadtext"></span>
                            </li>
                        </ul>
                    </li>
                    <li class="form_row pw">
                        <ul>
                            <li class="tit">
                                <label for="pass">비밀번호</label>
                            </li>
                            <li>
                                <input type="password" name="pass" id="pass" required>
                            </li>
                        </ul>
                    </li>
                    <li class="form_row pw_check">
                        <ul>
                            <li class="tit">
                                <label for="pass_confirm">비밀번호 확인</label>
                            </li>
                            <li>
                                <input type="password" name="pass_confirm" id="pass_confirm"  required>
                            </li>
                        </ul>
                    </li>
                    <li class="form_row">
                        <ul>
                            <li class="tit">
                                <label for="name">이름</label>
                            </li>
                            <li>
                                <input type="text" name="name" id="name"  required>
                            </li>
                        </ul>
                    </li>
                    <li class="form_row">
                        <ul>
                            <li class="tit">
                                <label for="nick">닉네임</label>
                            </li>
                            <li>
                                <input type="text" name="nick" id="nick"  required>
                            <span id="loadtext2"></span>

                            </li>
                        </ul>
                    </li>
                    <li class="form_row tel push_15_t">
                        <ul>
                            <li class="tit">
                                <span>휴대폰 번호</span>
                            </li>
                            <li class="border-r-1">
                                <label class="hidden" for="hp1">전화번호앞3자리</label>
                                <select class="hp" name="hp1" id="hp1"> 
                                    <option value='010'>010</option>
                                    <option value='011'>011</option>
                                    <option value='016'>016</option>
                                    <option value='017'>017</option>
                                    <option value='018'>018</option>
                                    <option value='019'>019</option>
                                </select> 
                

                            </li>
                            <li class="border-r-1">
                                <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2" onkeyup="check_input3()" required>
                            </li>
                            <li>
                                <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3" onkeyup="check_input4()" required>
                            </li>
                        </ul>
                    </li>
                    <li class="form_row email push_15_t">
                        <ul>
                            <li class="tit">
                                <span>이메일</span>
                            </li>
                            <li>
                                <label class="hidden" for="email1">이메일아이디</label>
                                <input type="text" id="email1" name="email1" required> <span>@ </span>
                                <label class="hidden" for="email2">이메일주소</label>
                                <input type="text" name="email2" id="email2" required>
                        </li>
                        </ul>
                    </li>
                </ul>
                <ul class="button">
                    <li class="join_btn"><button type="button" onclick="check_input()">회원가입</button></li>
                    <li class="reset_btn"><button type="button" onclick="reset_form()">다시쓰기</button></li>
                    <li class="cancel_btn"><a href="../index.html" onclick="join_cancel()">취소</a></li>
                </ul>
            </form> 
        </div>
    </div>
</body>
</html>


