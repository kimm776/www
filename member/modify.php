<?
	session_start();

  @extract($_POST);
  @extract($_GET);
  @extract($_SESSION);
?>
<meta charset="utf-8">
<?

  /*
     -post방식
      $pass
      $pass_confirm
      $name
      $nick
      $hp1  $hp2  $hp3
      $email1  $email2

    -세션변수
      $_SESSION['userid']
      $_SESSION['username']
      $_SESSION['usernick']
      $_SESSION['userlevel']
   */


   $hp = $hp1."-".$hp2."-".$hp3; //핸드폰 번호 합치기 '010-0000-1111'
   $email = $email1."@".$email2; //이메일 합치기 '111@nate.com'

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

   include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

   $sql = "update member set pass=password('$pass'), name='$name' , ";
   $sql .= "nick='$nick', hp='$hp', email='$email', regist_day='$regist_day' where id='$userid'";

   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
    
    //수정된 세션변수 이름과 닉네임을 바꾸어준
    $_SESSION['username'] = $name;
					//$_SESSION['username'] = $row[name];
    $_SESSION['usernick'] = $nick;
					//$_SESSION['usernick'] = $row[nick];
    


   mysql_close();                // DB 연결 끊기
   echo "
	   <script>
	     window.alert('회원정보가 수정되었습니다.');
	    location.href = '../index.html';
	   </script>
	";
?>

   