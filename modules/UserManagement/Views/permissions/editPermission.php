
<br>
<div class="card bg-light ">
  <div class="card-body">
    <div class="row">
       <div class="col-md-2 offset-md-10">
         <?php if(user_link('edit-role-permissions', $_SESSION['userPermmissions'])): ?>
          <a href="<?= base_url("Permission/edit_permission") ?>" class="btn btn-sm btn-primary btn-block float-right">Edit Permissions</a>
        <?php endif; ?>
       </div>
     </div>
    <br>
    <?php foreach($modules as $module): ?>
       <h3><?= ucwords($module['module_name']) ?></h3>
        <table class="table" id="<?= str_replace(' ', '_', $module['module_name'])?>">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Function Name</th>
              <th>Allowed Roles 
              <?php foreach($roles as $role): ?>
             

              &nbsp<input class='header_<?= str_replace(' ', '_',$role['role_name'])?>' type="checkbox" name="chk">
              <?php
                      echo ' '.$role['role_name'];
              
              ?>
              <?php endforeach; ?>
              
              </th>
            </tr>
          </thead>
          <tbody>
          <form method="post" action="<?= base_url() ?>permissions/edit">
          <?php foreach($permissions as $permission): ?>
            <?php if($permission['module_id'] == $module['id']): ?>
              <tr>
                <th scope="row"><?= $permission['order'] ?></th>
                <td><?= ucwords($permission['function_name']) ?></td>
                <td>
                  <?php foreach($roles as $role): ?>
                    <?php
                      $allowed_roles = substr($permission['allowed_roles'], 0, -1);
                      $allowed_roles = ltrim($allowed_roles, '[');
                      $finalAllowed = explode(',',$allowed_roles);
                      if(in_array($role['id'], $finalAllowed))
                      {
                        echo '<input class='.str_replace(" ", "_", $role["role_name"]).' type="checkbox" name="allowedUsers['.$permission['id'].']['.$role['id'].']" checked>';
                      }
                      else
                      {
                        echo '<input class='.str_replace(" ", "_", $role["role_name"]).' type="checkbox" name="allowedUsers['.$permission['id'].']['.$role['id'].']">';
                      }
                      echo ' '.$role['role_name'];
                    ?>
                  <?php endforeach; ?>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
          </tbody>
        </table>
    <?php endforeach; ?>
      <input type="submit" vaue="submit" class="btn btn-primary float-right">
    </form>
    <br><br><br>
  </div>
  </div>

<script>
var roles = JSON.parse('<?= json_encode($roles);?>');
var modules = JSON.parse(JSON.stringify(<?= json_encode($modules);?>));
                      
$(document).ready(function(){
  modules.forEach( function(modules){
      roles.forEach(function(role){
        
        $('.header_'+role.role_name.replace(' ', '_')).change(function(e){
          var table = $(e.target).closest('table');
          console.log(table)

          table.find('input.'+role.role_name.replace(' ', '_')).prop('checked', true);
          
          if(!$(this).prop("checked")) {
            table.find('input.'+role.role_name.replace(' ', '_')).prop('checked', false);
          }

        });
      });

    });
});

</script>