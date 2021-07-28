<?
  session_start();
  //로그아웃은 등록된 세션변수를 삭제해야 한다.
  unset($_SESSION['userid']);  //session변수를 없애는 메소드 'unset'
  unset($_SESSION['username']);
  unset($_SESSION['usernick']);
  unset($_SESSION['userlevel']);

  echo("
       <script>
          location.href = '../index.html'; 
         </script>
       ");
?>
