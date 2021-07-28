<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>부평문화재단 로그인</title>
    <link rel="stylesheet" href="css/login_form.css">
    <link rel="stylesheet" href="../css/common.css">
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
                        </ul>						
                    </div>
                    
                    <div id="login_button">
                        <button type="submit">로그인</button>
                        <a href="../index.html" onclick="join_cancel()">돌아가기</a>
                    </div>
                </div>
                <div id="join_button">
                    <ul>
                        <li>아직 회원이 아니신가요?</li>
                        <li><a href="../member/member_check.html">회원가입</a></li>
                    </ul>
                </div>
            </div>
        
        </form>
    </div>

</body>
</html>