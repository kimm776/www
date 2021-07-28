<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>부평문화재단 로그인</title>
    <link rel="stylesheet" href="css/login_form.css">
    <link rel="stylesheet" href="../common/css/common.css">
</head>
<body>
            
    <div class="content">
        <form name="member_form" method="post" action="login.php"> 
            <div class="logo_box">
                <h1 class="logo">
                    <a href="../index.html">부평구문화재단</a>
                </h1>
                <h2>LOGIN</h2>
            </div>
        
            <div class="login_join">
                <div class="login">
                    <div id="id_pw_input">
                        <ul>
                            <li><input type="text" name="id" class="login_input" placeholder="아이디" required></li>
                            <li><input type="password" name="pass" class="login_input" placeholder="비밀번호" required></li>
                            <li class="find">
                                <ul>
                                    <li><a href="pw_find.php">비밀번호 찾기</a></li>
                                    <li><a class="idfind" href="id_find.php">아이디 찾기</a></li>
                                </ul>
                            </li>
                        </ul>						
                    </div>
                    
                    <div id="login_button">
                        <button type="submit">로그인</button>
                        <a href="../index.html" onclick="join_cancel()">취소</a>
                    </div>
                </div>
                <div id="join_button">
                    <div class="join_box">
                        <p>아직 회원이 아니신가요?</p>
                        <p class="p2">회원가입을 하시면 <strong>부평구문화재단의 공연 할인혜택</strong>을 받으실 수 있습니다.</p>
                        <span>부평구문화재단은 만 14세 미만의 회원가입을 제한하고 있습니다.</span>
                    </div>
                    <a href="../member/member_check.html">부평구문화재단 가입하기</a>
                </div>
            </div>
        
        </form>
    </div>
</body>
</html>