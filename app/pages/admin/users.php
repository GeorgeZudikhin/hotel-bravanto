<?php if($action == 'add'):?>

	<div class="col-md-6 mx-auto">
	  <form method="post" enctype="multipart/form-data">

	    <h1 class="h3 mb-3 fw-normal">Add a new user</h1>

	    <?php if (!empty($errors)):?>
	      <div class="alert alert-danger">Please fix the problems below</div>
	    <?php endif;?>

	    <div class="my-2">
	    	<label class="d-block">
	    		<img class="mx-auto d-block image-preview-edit" src="<?=get_image('')?>" style="cursor: pointer;width: 150px;height: 150px;object-fit: cover;">
	    		<input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
	    	</label>
	    	<?php if(!empty($errors['image'])):?>
		      <div class="text-danger"><?=$errors['image']?></div>
		    <?php endif;?>

	    	<script>
	    		
	    		function display_image_edit(file)
	    		{
	    			document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
	    		}
	    	</script>
	    </div>


	    <div class="form-floating">
            <input value="<?=old_value('anrede')?>" type="text" name="anrede" class="form-control my-2" id="floatingInput" placeholder="Anrede">
            <label for="floatingInput">Anrede</label>
            </div>
                <?php if(!empty($errors['anrede'])):?>
                    <div class="text-danger"><?=$errors['anrede']?></div>
                <?php endif;?>

            <div class="form-floating">
            <input value="<?=old_value('vorname')?>" type="text" name="vorname" class="form-control my-2" id="floatingInput" placeholder="Vorname">
            <label for="floatingInput">Vorname</label>
            </div>
                <?php if(!empty($errors['vorname'])):?>
                    <div class="text-danger"><?=$errors['vorname']?></div>
                <?php endif;?>

            <div class="form-floating">
            <input value="<?=old_value('nachname')?>" type="text" name="nachname" class="form-control my-2" id="floatingInput" placeholder="Nachname">
            <label for="floatingInput">Nachname</label>
            </div>
                <?php if(!empty($errors['nachname'])):?>
                    <div class="text-danger"><?=$errors['nachname']?></div>
                <?php endif;?>

            <div class="form-floating">
            <input value="<?=old_value('email')?>" type="email" name="email" class="form-control my-2" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            </div>
                <?php if(!empty($errors['email'])):?>
                    <div class="text-danger"><?=$errors['email']?></div>
                <?php endif;?>

            <div class="form-floating">
            <input value="<?=old_value('username')?>" type="text" name="username" class="form-control my-2" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
            </div>
                <?php if(!empty($errors['username'])):?>
                    <div class="text-danger"><?=$errors['username']?></div>
                <?php endif;?>

            <div class="form-floating">
            <select name="role" class="form-select">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
            <label for="floatingInput">Role</label>
            </div>
                <?php if(!empty($errors['role'])):?>
                    <div class="text-danger"><?=$errors['role']?></div>
                <?php endif;?>

            <div class="form-floating">
            <input value="<?=old_value('password')?>" type="password" name="password" class="form-control my-2" id="floatingPassword" placeholder="Passwort">
            <label for="floatingPassword">Passwort</label>
            </div>
                <?php if(!empty($errors['password'])):?>
                    <div class="text-danger"><?=$errors['password']?></div>
                <?php endif;?>

            <div class="form-floating">
            <input value="<?=old_value('password_repeat')?>" type="password" name="repeat_password" class="form-control my-2" id="floatingPassword" placeholder="Passwort wiederholen">
            <label for="floatingPassword">Passwort wiederholen</label>
            </div>

            <div class="form-floating">
              <select name="status" class="form-select">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
              <label for="floatingInput">Status</label>
              </div>
                <?php if(!empty($errors['status'])):?>
                    <div class="text-danger"><?=$errors['status']?></div>
                <?php endif;?>
            
            <a href="<?=ROOT?>/admin/users">
            <button class="mt-2 mb-5 btn btn-lg btn-primary" type="button">Back</button>
            </a>
            <button class="mt-2 mb-5 btn btn-lg btn-primary float-end" type="submit">Add</button>
        </form>
        </main>
    </div>

<?php elseif($action == 'edit'):?>

	<div class="col-md-6 mx-auto">
	  <form method="post" enctype="multipart/form-data">

	    <h1 class="h3 mb-3 fw-normal">Edit user</h1>

	    <?php if(!empty($row)):?>

		    <?php if (!empty($errors)):?>
		      <div class="alert alert-danger">Please fix the problems below:</div>
		    <?php endif;?>

		    <div class="my-2">
		    	<label class="d-block">
		    		<img class="mx-auto d-block image-preview-edit" src="<?=get_image($row['image'])?>" style="cursor: pointer;width: 150px;height: 150px;object-fit: cover;">
		    		<input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
		    	</label>
		    	<?php if(!empty($errors['image'])):?>
			      <div class="text-danger"><?=$errors['image']?></div>
			    <?php endif;?>

		    	<script>
		    		
		    		function display_image_edit(file)
		    		{
		    			document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
		    		}
		    	</script>
		    </div>

		    <div class="form-floating">
              <input value="<?=old_value('anrede', $row['anrede'])?>" type="text" name="anrede" class="form-control my-2" id="floatingInput" placeholder="Anrede">
              <label for="floatingInput">Anrede</label>
              </div>
                  <?php if(!empty($errors['anrede'])):?>
                      <div class="text-danger"><?=$errors['anrede']?></div>
                  <?php endif;?>

              <div class="form-floating">
              <input value="<?=old_value('vorname', $row['vorname'])?>" type="text" name="vorname" class="form-control my-2" id="floatingInput" placeholder="Vorname">
              <label for="floatingInput">Vorname</label>
              </div>
                  <?php if(!empty($errors['vorname'])):?>
                      <div class="text-danger"><?=$errors['vorname']?></div>
                  <?php endif;?>

              <div class="form-floating">
              <input value="<?=old_value('nachname', $row['nachname'])?>" type="text" name="nachname" class="form-control my-2" id="floatingInput" placeholder="Nachname">
              <label for="floatingInput">Nachname</label>
              </div>
                  <?php if(!empty($errors['nachname'])):?>
                      <div class="text-danger"><?=$errors['nachname']?></div>
                  <?php endif;?>

              <div class="form-floating">
              <input value="<?=old_value('email', $row['email'])?>" type="email" name="email" class="form-control my-2" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
              </div>
                  <?php if(!empty($errors['email'])):?>
                      <div class="text-danger"><?=$errors['email']?></div>
                  <?php endif;?>

              <div class="form-floating">
              <input value="<?=old_value('username', $row['username'])?>" type="text" name="username" class="form-control my-2" id="floatingInput" placeholder="Username">
              <label for="floatingInput">Username</label>
              </div>
                  <?php if(!empty($errors['username'])):?>
                      <div class="text-danger"><?=$errors['username']?></div>
                  <?php endif;?>

              <div class="form-floating">
              <select name="role" class="form-select">
                <option <?=old_select('role', 'user', $row['role'])?> value="user">User</option>
                <option <?=old_select('role', 'admin', $row['role'])?> value="admin">Admin</option>
              </select>
              <label for="floatingInput">Role</label>
              </div>
                <?php if(!empty($errors['role'])):?>
                    <div class="text-danger"><?=$errors['role']?></div>
                <?php endif;?>


              <div class="form-floating">
              <input value="<?=old_value('password')?>" type="password" name="password" class="form-control my-2" id="floatingPassword" placeholder="Passwort">
              <label for="floatingPassword">Passwort (leer lassen, um den alten zu behalten)</label>
              </div>
                  <?php if(!empty($errors['password'])):?>
                      <div class="text-danger"><?=$errors['password']?></div>
                  <?php endif;?>

              <div class="form-floating">
              <input value="<?=old_value('password_repeat')?>" type="password" name="repeat_password" class="form-control my-2" id="floatingPassword" placeholder="Passwort wiederholen">
              <label for="floatingPassword">Passwort wiederholen</label>
              </div>

              <div class="form-floating">
              <select name="status" class="form-select">
                <option <?=old_select('status', 'active', $row['status'])?> value="active">Active</option>
                <option <?=old_select('status', 'inactive', $row['status'])?> value="inactive">Inactive</option>
              </select>
              <label for="floatingInput">Status</label>
              </div>
                <?php if(!empty($errors['status'])):?>
                    <div class="text-danger"><?=$errors['status']?></div>
                <?php endif;?>

		    <a href="<?=ROOT?>/admin/users">
			    <button class="mt-2 mb-5 btn btn-lg btn-primary" type="button">Back</button>
			</a>
		    <button class="mt-2 mb-5 btn btn-lg btn-primary  float-end" type="submit">Save</button>
		<?php else:?>

			<div class="alert alert-danger text-center">Record not found!</div>
		<?php endif;?>

	  </form>
	</div>

<?php elseif($action == 'delete'):?>

	<div class="col-md-6 mx-auto">
	  <form method="post">

	    <h1 class="h3 mb-3 fw-normal">Delete user</h1>

	    <?php if(!empty($row)):?>

		    <div class="form-floating">
            <div class="form-control my-2"><?=old_value('anrede', $row['anrede'])?></div>
            <label for="floatingInput">Anrede</label>
            </div>

            <div class="form-floating">
            <div class="form-control my-2"><?=old_value('vorname', $row['vorname'])?></div>
            <label for="floatingInput">Vorname</label>
            </div>

            <div class="form-floating">
            <div class="form-control my-2"><?=old_value('nachname', $row['nachname'])?></div>
            <label for="floatingInput">Nachname</label>
            </div>

            <div class="form-floating">
            <div class="form-control my-2"><?=old_value('email', $row['email'])?></div>
            <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
            <div class="form-control my-2"><?=old_value('username', $row['username'])?></div>
            <label for="floatingInput">Username</label>
            </div>
 

		    <a href="<?=ROOT?>/admin/users">
			    <button class="mt-2 btn btn-lg btn-primary" type="button">Back</button>
			</a>
		    <button class="mt-2 btn btn-lg btn-danger  float-end" type="submit">Delete</button>
		<?php else:?>

			<div class="alert alert-danger text-center">Record not found!</div>
		<?php endif;?>

	  </form>
	</div>

<?php else:?>

	<h4>
		Users 
		<a href="<?=ROOT?>/admin/users/add">
			<button class="btn btn-primary">Add New</button>
		</a>
	</h4>

	<div class="table-responsive">
	<table class="table">
		
		<tr>
			  <th>#</th>
              <th>Anrede</th>
              <th>Vorname</th>
              <th>Nachname</th>
              <th>Email</th>
              <th>Username</th>
              <th>Image</th>
              <th>Date</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
		</tr>
		<?php  
			$limit = 10;
			$offset = ($PAGE['page_number'] - 1) * $limit;

			$query = "select * from users order by role, id desc limit $limit offset $offset";
			$rows = query($query);
		?>

		<?php if(!empty($rows)):?>
			<?php foreach($rows as $row):?>
			<tr>
				  <td><?=$row['id']?></td>
                  <td><?=$row['anrede']?></td>
                  <td><?=$row['vorname']?></td>
                  <td><?=$row['nachname']?></td>
                  <td><?=$row['email']?></td>
                  <td><?=$row['username']?></td>
				<td>
					<img src="<?=get_image($row['image'])?>" style="width: 100px;height: 100px;object-fit: cover;">
				</td>
				<td><?=date("jS M, Y",strtotime($row['date']))?></td>
				<td><?=$row['role']?></td>
                <td><?=$row['status']?></td>
				<td>
					<a href="<?=ROOT?>/admin/users/edit/<?=$row['id']?>">
						<button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
					</a>
					<a href="<?=ROOT?>/admin/users/delete/<?=$row['id']?>">
						<button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
					</a>
				</td>
			</tr>
			<?php endforeach;?>
		<?php endif;?>
	</table>

	<div class="col-md-12 mb-4">
		<a href="<?=$PAGE['first_link']?>">
			<button class="btn btn-primary">First Page</button>
		</a>
		<a href="<?=$PAGE['prev_link']?>">
			<button class="btn btn-primary">Prev Page</button>
		</a>
		<a href="<?=$PAGE['next_link']?>">
			<button class="btn btn-primary float-end">Next Page</button>
		</a>
	</div>
	</div>

<?php endif;?>