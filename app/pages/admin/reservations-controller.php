<?php

if($action == 'edit')
    {
        
        $query = "select * from reservations where id = :id limit 1";
        $row = query_row($query, ['id'=>$id]);

        if(!empty($_POST))
        {
          if($row)
          {
            //validate
            $errors = [];

            if(empty($errors))
            {

              //save to database
              $data = [];
              $data['status_reservation'] = $_POST['status_reservation'];
              $data['id'] = $id;

              
              $query = "update reservations set status_reservation = :status_reservation where id = :id limit 1";

              query($query, $data);

              header("Location: ".ROOT. "/" . "admin/reservations");

            }
          }
        }
    }else
    if($action == 'delete')
    {
        
        $query = "select * from reservations where id = :id limit 1";
        $row = query_row($query, ['id'=>$id]);

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
          if($row)
          {
            //validate
            $errors = [];
 
            if(empty($errors))
            {
              //delete from database
              $data = [];
              $data['id'] = $id;

              $query = "delete from reservations where id = :id limit 1";
              query($query, $data);

              header("Location: ".ROOT. "/" . "admin/reservations");
            }
          }
        }
      }