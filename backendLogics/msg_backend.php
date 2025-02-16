<?php
include '/xampp/htdocs/TeamSpirit/backendLogics/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   $team_id = $_GET['team_id'];
   $msg = $_GET['msg'];
   $s_id = $_SESSION['uid'];

   $sql = "INSERT INTO `messages`(`s_id`, `t_id`, `msg`) VALUES('$s_id', '$team_id', '$msg')";
   mysqli_query($conn, $sql);

   echo '<form id="autoClk" action="../UserInterface/teamPage.php" method="post">
      <input type="hidden" name="team_id" value="'.$team_id.'">
   </form>';

   echo '<script>
      window.onload = function() {
         document.getElementById("autoClk").submit();
      };
   </script>';
}
?>
