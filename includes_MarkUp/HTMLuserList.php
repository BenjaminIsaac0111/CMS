<?php 
if (isset($_GET['makeAdmin'])) {
  if ($session->isAdmin()) {
    user::toggleUserAdministrator($_GET['makeAdmin']);
  }
}

?>
<section id="user">
<h1 class="text-center">User Control</h1>
  <div class="row">
      <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>Email</th>
        <th>T&amp;C Check</th>
        <th>Is Admin</th>
        <th>Controls</th>
      </tr>
      <?php 
      $user = user::findAll();
      foreach($user as $user): ?> 
      <tr>
        <td><?php echo $user->id;?></td>
        <td><?php echo $user->username;?></td>
        <td><?php echo $user->firstname;?></td>
        <td><?php echo $user->lastname;?></td>
        <td><?php echo $user->ageRange;?></td>
        <td><?php echo $user->email;?></td>
        <td><?php echo $user->termsAndConditionsCheck;?></td>
        <td><?php echo $user->adminFlag;?></td>
        <td><a class="btn btn-info" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?makeAdmin=<?php echo $user->id; ?>">Toggle Admin</a></td>

      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</section>

