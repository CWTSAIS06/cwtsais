<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="<?=base_url()?>/attendance/verify" method="post">
      <input type="text" name="student_number" value="" placeholder="Student Number">
      <button type="submit" name="button">Login</button>
    </form>
    <form class="" action="<?=base_url()?>/attendance/timeout" method="post">
      <input type="text" name="student_number" value="" placeholder="Student Number">
      <button type="submit" name="button">Timeout</button>
    </form>
  </body>
</html>
