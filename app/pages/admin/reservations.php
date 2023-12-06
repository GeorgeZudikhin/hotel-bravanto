<?php if($action == 'edit'):?>

<div class="col-md-6 mx-auto">
  <form method="post" enctype="multipart/form-data">

    <h1 class="h3 mb-3 fw-normal">Edit reservation</h1>

    <?php if(!empty($row)):?>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('id', $row['id'])?></div>
        <label for="floatingInput">Reservation #</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('user_id', $row['user_id'])?></div>
        <label for="floatingInput">User ID</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('user_id', $row['username'])?></div>
        <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('begin_of_stay', $row['begin_of_stay'])?></div>
        <label for="floatingInput">Begin of Stay</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('end_of_stay', $row['end_of_stay'])?></div>
        <label for="floatingInput">End of Stay</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('guests', $row['guests'])?></div>
        <label for="floatingInput">Number of Guests</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('parking', $row['parking'])?></div>
        <label for="floatingInput">Parking</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('breakfast', $row['breakfast'])?></div>
        <label for="floatingInput">Breakfast</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('pets', $row['pets'])?></div>
        <label for="floatingInput">Pets</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('date', $row['date'])?></div>
        <label for="floatingInput">Date and time</label>
        </div>

        <div class="form-floating">
            <select name="status_reservation" class="form-select">
                <option <?=old_select('status_reservation', 'neu', $row['status_reservation'])?> value="neu">Neu</option>
                <option <?=old_select('status_reservation', 'bestatigt', $row['status_reservation'])?> value="bestätigt">Bestätigt</option>
                <option <?=old_select('status_reservation', 'storniert', $row['status_reservation'])?> value="storniert">Storniert</option>
            </select>
            <label for="floatingInput">Status</label>
            </div>


        <a href="<?=ROOT?>/admin/reservations">
            <button class="mt-2 mb-5 btn btn-lg btn-primary" type="button">Back</button>
        </a>
        <button class="mt-2 mb-5 btn btn-lg btn-primary float-end" type="submit">Save</button>

    <?php else:?>
        <div class="alert alert-danger text-center">Record not found!</div>
    <?php endif;?>
    

  </form>
</div>

<?php elseif($action == 'delete'):?>

<div class="col-md-6 mx-auto">
  <form method="post">

    <h1 class="h3 mb-3 fw-normal">Delete reservation</h1>

    <?php if(!empty($row)):?>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('id', $row['id'])?></div>
        <label for="floatingInput">Reservation #</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('user_id', $row['user_id'])?></div>
        <label for="floatingInput">User ID</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('user_id', $row['username'])?></div>
        <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('begin_of_stay', $row['begin_of_stay'])?></div>
        <label for="floatingInput">Begin of Stay</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('end_of_stay', $row['end_of_stay'])?></div>
        <label for="floatingInput">End of Stay</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('guests', $row['guests'])?></div>
        <label for="floatingInput">Number of Guests</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('parking', $row['parking'])?></div>
        <label for="floatingInput">Parking</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('breakfast', $row['breakfast'])?></div>
        <label for="floatingInput">Breakfast</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('pets', $row['pets'])?></div>
        <label for="floatingInput">Pets</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('date', $row['date'])?></div>
        <label for="floatingInput">Date and time</label>
        </div>

        <div class="form-floating">
        <div class="form-control my-2"><?=old_value('status_reservation', $row['status_reservation'])?></div>
        <label for="floatingInput">Status</label>
        </div>

        <a href="<?=ROOT?>/admin/reservations">
            <button class="mt-2 mb-5 btn btn-lg btn-primary" type="button">Back</button>
        </a>
        <button class="mt-2 mb-5 btn btn-lg btn-danger  float-end" type="submit">Delete</button>
    <?php else:?>

        <div class="alert alert-danger text-center">Record not found!</div>
    <?php endif;?>

  </form>
</div>

<?php else:?>

<h4>
    Reservations
</h4>

<div class="table-responsive">
<table class="table">
    
    <tr>
          <th>#</th>
          <th>User ID</th>
          <th>Username</th>
          <th>Begin of stay</th>
          <th>End of stay</th>
          <th>Number of Guests</th>
          <th>Parking</th>
          <th>Breakfast</th>
          <th>Pets</th>
          <th>Date and time of reservation</th>
          <th>Status</th>
          <th>Action</th>
    </tr>
    <?php  
        $limit = 10;
        $offset = ($PAGE['page_number'] - 1) * $limit;

        $query = "select * from reservations order by id desc limit $limit offset $offset";
        $rows = query($query);
    ?>

    <?php if(!empty($rows)):?>
        <?php foreach($rows as $row):?>
        <tr>
              <td><?=$row['id']?></td>
              <td><?=$row['user_id']?></td>
              <td><?=$row['username']?></td>
              <td><?=$row['begin_of_stay']?></td>
              <td><?=$row['end_of_stay']?></td>
              <td><?=$row['guests']?></td>
              <td><?=$row['parking']?></td>
              <td><?=$row['breakfast']?></td>
              <td><?=$row['pets']?></td>
              <td><?=$row['date']?></td>
              <td><?=$row['status_reservation']?></td>
            <td>
                <a href="<?=ROOT?>/admin/reservations/edit/<?=$row['id']?>">
                    <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                </a>
                <a href="<?=ROOT?>/admin/reservations/delete/<?=$row['id']?>">
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