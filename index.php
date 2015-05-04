<!-- 

DEAR GROUPMATES, this is already well-documented (I think?).
Search for your specific database ex: "mysql" and you will see the div where the view for that specific database is coded(?).
Please document your works. And please use unique IDs. Thank you. 

PS: I will fix the color scheme and the logo soon.

-->


<!DOCTYPE html>

  <?php

      $servername = "localhost";
      $username = "root";
      $password = "root";
      $database = "recariofruits";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      
      if(!empty($_POST["fruit_id"])) {
        $delete_query = $conn->query("DELETE FROM fruit WHERE id=".$_POST["fruit_id"]);
      }

      #if any submit button is pressed
      if(isset($_POST['submit'])){
        if ($_POST['submit']=="mysql add"){
          $name = $_POST['mysql_fruit_name'];
          $price = $_POST['mysql_fruit_price'];
          $quantity = $_POST['mysql_fruit_quantity'];
          $distributor = $_POST['mysql_fruit_distributor'];
          $imgfile = $_POST['mysql_fruit_image'];

          $add_fruit_query = $conn->query("INSERT INTO fruit (name, price, quantity, distributor, img) VALUES ('".$name."',".$price.",".$quantity.",'".$distributor."','".$imgfile."')") or die;
        }
        elseif ($_POST['submit']=="mysql edit") {
          #Update fruit table
          $id = $_POST['edit_mysql_fruit_id'];
          $name = $_POST['edit_mysql_fruit_name'];
          $price = $_POST['edit_mysql_fruit_price'];
          $quantity = $_POST['edit_mysql_fruit_quantity'];
          $distributor = $_POST['edit_mysql_fruit_distributor'];
          $imgfile = $_POST['edit_mysql_fruit_image'];

          $edit_fruit_query = $conn->query("UPDATE `fruit` SET `name`='".$name."',`price`=".$price.",`quantity`=".$quantity.",`distributor`='".$distributor."' WHERE id=".$id) or die;
          if($imgfile != "") $edit_fruit_query = $conn->query("UPDATE fruit SET img='".$imgfile."' WHERE id = ".$id ) or die;
        
          #add event in log table
          $curr_time = date("Y-m-d H:i:s");
          $log_fruit_query = $conn->query("INSERT INTO log (logdatetime, fname, fprice) VALUES ('".$curr_time."','".$name."',".$price.")") or die;
        }
      }
  ?>

  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </head>

    <body>      
      <!-- HEADER. LOGO SOON -->

      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper red darken-2">
            <a href="#!" class="brand-logo center">RecarioFruits</a>
            
          </div>
        </nav>
      </div>
      
      <br/>

      <!-- NAVIGATION FOR MYSQL/MONGODB/COUCHDB -->
      
      <div class="row container">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#mysql">MySQL</a></li>
          </ul>
        </div>
        
        <!-- MySQL
      
        THIS IS THE DIV FOR MYSQL

        -->
        <div id="mysql" class="col s12">

        <br/>

        <!-- BUTTON TRIGGER FOR ADD ITEM -->

          <div class="container">
            <a class="waves-effect waves-light btn modal-trigger right" href="#modal1"><i class="mdi-content-add-circle left"></i>Add Fruit</a>
          </div>

          <br/><br/>

          <!-- MODAL FOR ADD MYSQL ITEM 
            ids:
            for image file => mysql_fruit_image
                fruit name => mysql_fruit_name
                price => mysql_fruit_price
                quantity => mysql_fruit_quantity
                distrubutor => mysql_fruit_distributor
                date => system date

                Save the date when the row is added on the date column.
          -->

          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Add Fruit</h4>

              <div class="row">
              <form class="col s12" method="POST" action="">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" name="mysql_fruit_image"
                    id="mysql_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Fruit Name" name="mysql_fruit_name" id="mysql_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input placeholder="Price" name="mysql_fruit_price" id="mysql_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                    <input placeholder="Quantity" name="mysql_fruit_quantity" id="mysql_fruit_quantity" type="text" class="validate">
                    
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Distributor" name="mysql_fruit_distributor" id="mysql_fruit_distributor" type="text" class="validate">
                  </div>
                </div>
                
                <div class="modal-footer">
                  <button type="submit" name="submit" id="mysql_submit" class=" modal-action modal-close waves-effect waves-green mdi-content-add-circle btn" value="mysql add">
                        Add New Fruit
                  </button>
                </div>    
              </form>
            </div>
            </div>
            
          </div>

          <!-- MODAL FOR EDIT MYSQL ITEMS 
            ids:
            for image file => edit_mysql_fruit_image
                fruit name => edit_mysql_fruit_name
                price => edit_mysql_fruit_price
                quantity => edit_mysql_fruit_quantity
                distrubutor => edit_mysql_fruit_distributor
                date => system date

                Save the date when the row is updated on the date column.
          -->

          <div id="modal2" class="modal">
            <div class="modal-content">
              <h4>Edit Fruit</h4>

              <div class="row">
              <form class="col s12" method="POST" action="">

                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="edit_mysql_fruit_image" name="edit_mysql_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                  <label>Fruit Name</label>
                    <input placeholder="Fruit Name" id="edit_mysql_fruit_name" name="edit_mysql_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <input type="hidden" value="" name="edit_mysql_fruit_id" id="edit_mysql_fruit_id">
                  <div class="input-field col s3">
                    <label>Price</label>
                    <input placeholder="Price" id="edit_mysql_fruit_price" name="edit_mysql_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                  <label>Quantity</label>
                    <input placeholder="Quantity" id="edit_mysql_fruit_quantity" name="edit_mysql_fruit_quantity" type="text" class="validate">
                    
                  </div>
                  
                  <div class="input-field col s6">
                    <label>Distributor</label>
                    <input placeholder="Distributor" id="edit_mysql_fruit_distributor" name="edit_mysql_fruit_distributor" type="text" class="validate">
                  </div>
                </div>
                <div class="row">
                  <div class="modal-footer">
                    <button type="submit" name="submit" id="mysql_edit_submit" class=" modal-action modal-close waves-effect waves-green mdi-content-add-circle btn" value="mysql edit">
                          Edit Fruit
                    </button>
                  </div>  
                </div>

              </form>
            </div>
            </div>
            
          </div>

          <!-- VIEW TABLE FOR MYSQL -->
          
           <table class="centered striped container">
            <thead>
              <tr class="green lighten-3">
                  <th></th>
                  <th data-field="id">Fruit</th>
                  <th data-field="name">Price</th>
                  <th data-field="price">Quantity</th>
                  <th data-field="distributor">Distributor</th>
                  <th data-field="date">Log File</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
            </thead>

            <!--Query in order to fetch all available fruits in the database-->
            <?php
              $fruit_query = $conn->query("SELECT * FROM fruit");
              $total = $fruit_query->num_rows;

              $fruit_collection = $fruit_query->fetch_all();
            ?>

            <tbody>
              <?php
                for ($i=0; $i < $total; $i++) {
                  $edit_log_query = $conn->query("SELECT * FROM log WHERE fname='".$fruit_collection[$i][1]."'");
                  $total_edit = $edit_log_query->num_rows;
                  $history = $edit_log_query->fetch_all();

                  echo "
                    <tr id='fruit_".$fruit_collection[$i][0]."'>
                      <td><img class='circle' height='50px' src=". $fruit_collection[$i][5] ."></td>
                      <td>". $fruit_collection[$i][1] ."<input type='hidden' value='".$fruit_collection[$i][1]."' class='name".$fruit_collection[$i][0]."'></td>
                      <td>". $fruit_collection[$i][2] ."<input type='hidden' value='".$fruit_collection[$i][2]."' class='price".$fruit_collection[$i][0]."'></td>
                      <td>". $fruit_collection[$i][3] ."<input type='hidden' value='".$fruit_collection[$i][3]."' class='quantity".$fruit_collection[$i][0]."'></td>
                      <td>". $fruit_collection[$i][4] ."<input type='hidden' value='".$fruit_collection[$i][4]."' class='distributor".$fruit_collection[$i][0]."'></td>
                      <td><a href=''>".$history[$total_edit-1][0]."</a></td>
                      <td><button class='btn-floating waves-effect waves-light btn modal-trigger edit' href='#modal2' value='".$fruit_collection[$i][0]."'><i class='mdi-image-edit left'></i></button></td>
                      <td><button class='btn-floating waves-effect waves-light btn btnDeleteAction' name='delete' value='mysql delete' onClick='deleteItem(".$fruit_collection[$i][0].")'><i class='mdi-action-delete left'></i></button></td>
                    </tr>
                  ";
                }
              ?>
            </tbody>
          </table>
        </div>

        

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal-trigger').leanModal();
        
          $('.edit').click(function(){
            
            var a=$(this).val();
            
            $('#edit_mysql_fruit_id').val(a);
            $('#edit_mysql_fruit_name').val($('.name'+a).val());
            $('#edit_mysql_fruit_price').val($('.price'+a).val());
            $('#edit_mysql_fruit_quantity').val($('.quantity'+a).val());
            $('#edit_mysql_fruit_distributor').val($('.distributor'+a).val());

          });
        });

        function deleteItem(id) {
            var queryString = 'action=delete&fruit_id='+ id;

            jQuery.ajax({
            url: "index.php",
            data:queryString,
            type: "POST",
            success:function(data){
              $('#fruit_'+id).fadeOut();
            },
            error:function (){}
            });
        }
      </script>
    
    </body>
  </html>