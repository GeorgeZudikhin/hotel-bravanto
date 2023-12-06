  <?php 

    //add new
    if($action == 'add')
    {
        if(!empty($_POST))
        {
          //validate
          $errors = [];

          if(empty($_POST['anrede']))
      {
        $errors['anrede'] = "Please enter the new user's form of address!";
      }
      else if(!preg_match("/^[a-zA-Z]+$/", $_POST['anrede']))
      {
        $errors['anrede'] = "Form of address can only contain letters!";
      }
      else if(strlen($_POST['anrede']) > 32)
      {
        $errors['anrede'] = "Form of address can be no longer than 32 characters!";
      }


      if(empty($_POST['vorname']))
      {
        $errors['vorname'] = "Please enter the new user's first name!";
      }
      else if(!preg_match("/^[a-zA-Z]+$/", $_POST['vorname']))
      {
        $errors['vorname'] = "First name can only contain letters!";
      }
      else if(strlen($_POST['vorname']) > 32)
      {
        $errors['vorname'] = "First name can be no longer than 32 characters!";
      }



      if(empty($_POST['nachname']))
      {
        $errors['nachname'] = "Please enter the new user's last name!";
      }
      else if(!preg_match("/^[a-zA-Z]+$/", $_POST['nachname']))
      {
        $errors['nachname'] = "Last name can only contain letters!";
      }
      else if(strlen($_POST['nachname']) > 32)
      {
        $errors['nachname'] = "Last name can be no longer than 32 characters!";
      }


      $query = "select id from users where email = :email limit 1";
      $email = query($query, ['email'=>$_POST['email']]);
  
      if(empty($_POST['email']))
      {
        $errors['email'] = "Please enter the new user's email!";
      }
      else if($email)
      {
        $errors['email'] = "The email is already in use!";
      }
  


      if(empty($_POST['username']))
      {
        $errors['username'] = "Please enter the new user's username!";
      }
      else if(!preg_match("/^[a-zA-Z0-9-]+$/", $_POST['username']))
      {
        $errors['username'] = "Username can only contain letters and numbers!";
      }
      else if(strlen($_POST['username']) > 64)
      {
        $errors['username'] = "Username can be no longer than 64 characters!";
      }



      if(empty($_POST['password']))
      {
        $errors['password'] = "Please enter the new user's password!";
      }
      else if(strlen($_POST['password']) < 8)
      {
        $errors['password'] = "Password must contain 8 character or more!";
      }
      else if($_POST['password'] !== $_POST['repeat_password'])
      {
        $errors['password'] = "Passwords do not match!";
      }

          //validate image
          $allowed = ['image/jpeg','image/png','image/webp'];
          if(!empty($_FILES['image']['name']))
          {
            $destination = "";
            if(!in_array($_FILES['image']['type'], $allowed))
            {
              $errors['image'] = "Image format not supported";
            }else
            {
              $folder = "uploads/";
              if(!file_exists($folder))
              {
                mkdir($folder, 0777, true);
              }

              $destination = $folder . time() . $_FILES['image']['name'];
              move_uploaded_file($_FILES['image']['tmp_name'], $destination);
              resize_image($destination);
            }

          }
   
          if(empty($errors))
          {
            //save to database
            $data = [];
            $data['anrede'] = $_POST['anrede'];
            $data['vorname'] = $_POST['vorname'];
            $data['nachname'] = $_POST['nachname'];
            $data['email'] = $_POST['email'];
            $data['username'] = $_POST['username'];
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $data['role'] = $_POST['role'];
            $data['status'] = $_POST['status'];

            $query = "insert into users (anrede, vorname, nachname, email, username, password, role, status) values (:anrede, :vorname, :nachname, :email, :username, :password, :role, :status)";
            
            if(!empty($destination))
            {
              $data['image'] = $destination;
              $query = "insert into users (anrede, vorname, nachname, email, username, password, role, image, status) values (:anrede, :vorname, :nachname, :email, :username, :password, :role, :image. :status)";
            }

            query($query, $data);

            redirect('admin/users');

          }
        }
    }else
    if($action == 'edit')
    {
        
        $query = "select * from users where id = :id limit 1";
        $row = query_row($query, ['id'=>$id]);

        if(!empty($_POST))
        {

          if($row)
          {

            //validate
            $errors = [];

            if(empty($_POST['anrede']))
            {
              $errors['anrede'] = "Please enter the user's form of address!";
            }
            else if(!preg_match("/^[a-zA-Z]+$/", $_POST['anrede']))
            {
              $errors['anrede'] = "Form of address can only contain letters!";
            }
            else if(strlen($_POST['anrede']) > 32)
            {
              $errors['anrede'] = "Form of address can be no longer than 32 characters!";
            }


            if(empty($_POST['vorname']))
            {
              $errors['vorname'] = "Please enter the user's first name!";
            }
            else if(!preg_match("/^[a-zA-Z]+$/", $_POST['vorname']))
            {
              $errors['vorname'] = "First name can only contain letters!";
            }
            else if(strlen($_POST['vorname']) > 32)
            {
              $errors['vorname'] = "First name can be no longer than 32 characters!";
            }



            if(empty($_POST['nachname']))
            {
              $errors['nachname'] = "Please enter the user's last name!";
            }
            else if(!preg_match("/^[a-zA-Z]+$/", $_POST['nachname']))
            {
              $errors['nachname'] = "Last name can only contain letters!";
            }
            else if(strlen($_POST['nachname']) > 32)
            {
              $errors['nachname'] = "Last name can be no longer than 32 characters!";
            }


            $query = "select id from users where email = :email && id != :id limit 1";
            $email = query($query, ['email'=>$_POST['email'], 'id'=>$id]);
        
            if(empty($_POST['email']))
            {
              $errors['email'] = "Please enter the user's email!";
            }
            else if($email)
            {
              $errors['email'] = "The email is already in use!";
            }
        


            if(empty($_POST['username']))
            {
              $errors['username'] = "Please enter the user's username!";
            }
            else if(!preg_match("/^[a-zA-Z0-9-]+$/", $_POST['username']))
            {
              $errors['username'] = "Username can only contain letters and numbers!";
            }
            else if(strlen($_POST['username']) > 64)
            {
              $errors['username'] = "Username can be no longer than 64 characters!";
            }



            if(empty($_POST['password']))
            {}
            else if(strlen($_POST['password']) < 8)
            {
              $errors['password'] = "Password must contain 8 character or more!";
            }
            else if($_POST['password'] !== $_POST['repeat_password'])
            {
              $errors['password'] = "Passwords do not match!";
            }

            //validate image
            $allowed = ['image/jpeg','image/png','image/webp'];
            if(!empty($_FILES['image']['name']))
            {
              $destination = "";
              if(!in_array($_FILES['image']['type'], $allowed))
              {
                $errors['image'] = "Image format not supported";
              }else
              {
                $folder = "uploads/";
                if(!file_exists($folder))
                {
                  mkdir($folder, 0777, true);
                }

                $destination = $folder . time() . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                resize_image($destination);
              }


            }
     
            if(empty($errors))
            {
              //save to database
              $data = [];
              $data['anrede'] = $_POST['anrede'];
              $data['vorname'] = $_POST['vorname'];
              $data['nachname'] = $_POST['nachname'];
              $data['email'] = $_POST['email'];
              $data['username'] = $_POST['username'];
              $data['role'] = $_POST['role'];
              $data['id'] = $id;
              $data['status'] = $_POST['status'];

              $password_str = "";
              $image_str = "";

              if(!empty($_POST['password']))
              {
                $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $password_str = "password = :password, ";
              }

              if(!empty($destination))
              {
                $image_str = "image = :image, ";
                $data['image'] = $destination;
              }
              
              $query = "update users set anrede = :anrede, vorname = :vorname, nachname = :nachname, email = :email, username = :username, $password_str $image_str role = :role, status = :status where id = :id limit 1";

              query($query, $data);
              redirect('admin/users');

            }
          }
        }
    }else
    if($action == 'delete')
    {
        
        $query = "select * from users where id = :id limit 1";
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

              $query = "delete from users where id = :id limit 1";
              query($query, $data);

              if(file_exists($row['image']))
                unlink($row['image']);

              redirect('admin/users');

            }
          }
        }
      }