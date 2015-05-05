<!DOCTYPE html>
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
            <li class="tab col s3"><a  href="#mongodb">MongoDB</a></li>
          </ul>
        </div>
		
        <!-- MongoDB
      
        THIS IS THE DIV FOR MONGODB

        -->

        <div id="mongodb" class="col s12 container">
          <br/>

          <!-- BUTTON TRIGGER FOR ADD ITEM -->

          <div class="container">
            <a class="waves-effect waves-light btn modal-trigger right" href="#modal3"><i class="mdi-content-add-circle left"></i>Add Fruit</a>
          </div>

          <br/><br/>
	<div id="modal3" class="modal">
            <div class="modal-content">
              <h4>Add Fruit</h4>

              <div class="row">
              <form method="POST" action="mongodb_add.php" class="col s12" enctype="multipart/form-data">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="mongodb_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" name="the_file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Fruit Name" id="mongodb_fruit_name" type="text" class="validate" name="name">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input placeholder="Price" id="mongodb_fruit_price" type="text" class="validate" name="price">
                  </div>
                  <div class="input-field col s3">
                    <input placeholder="Quantity" id="mongodb_fruit_quantity" type="text" class="validate" name="quantity">  
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Distributor" id="mongodb_fruit_distributor" type="text" class="validate" name="distributor">  
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="modal-action modal-close waves-effect waves-green mdi-content-add-circle btn" type="submit" value="Add Fruit">Add Fruit</button>
                </div>    
              </form>
            </div>
            </div>
            
          </div>


          <!-- MODAL FOR EDIT MONGODB ITEMS 
            ids:
            for image file => edit_mongodb_fruit_image
                fruit name => edit_mongodb_fruit_name
                price => edit_mongodb_fruit_price
                quantity => edit_mongodb_fruit_quantity
                distributor => edit_mongodb_fruit_distributor
                date => system date

                Save the date when the row is updated on the date column.
          -->

          <div id="modal2" class="modal">
            <div class="modal-content">
              <h4>Edit Fruit</h4>

              <div class="row">
              <form method="POST" action="mongodb_edit_process.php" class="col s12" enctype="multipart/form-data">

                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="edit_mongodb_fruit_image" name="fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" name="the_file"/>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="input-field col s12">
                  <label>Fruit Name</label>
                    <input placeholder="Fruit Name" id="edit_mongodb_fruit_name" name="edit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <input type="hidden" value="" name="edit_id" id="edit_mongodb_fruit_id">
                  <div class="input-field col s3">
                    <label>Price</label>
                    <input placeholder="Price" id="edit_mongodb_fruit_price" name="edit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                  <label>Quantity</label>
                    <input placeholder="Quantity" id="edit_mongodb_fruit_quantity" name="edit_quantity" type="text" class="validate">
                    
                  </div>
                  
                  <div class="input-field col s6">
                    <label>Distributor</label>
                    <input placeholder="Distributor" id="edit_mongodb_fruit_distributor" name="edit_distributor" type="text" class="validate">
                  </div>
                </div>
                <div class="row">
                  <div class="modal-footer">
                    <button type="submit" class=" modal-action modal-close waves-effect waves-green mdi-image-edit btn">Edit Fruit</button>
                  </div>  
                </div>

              </form>
            </div>
            </div>
            
          </div>

          <!-- VIEW TABLE FOR MONGODB -->

           <table class="centered striped container">
            <thead>
              <tr class="green lighten-3">
                  <th></th>
                  <th data-field="id">Fruit</th>
                  <th data-field="name">Price</th>
                  <th data-field="price">Quantity</th>
                  <th data-field="distributor">Distributor</th>
                  <th data-field="date">Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
            </thead>

            <tbody>
				<?php
					// $start = microtime(true);
					
					$dbhost = 'localhost';
					$dbname = 'test';
 
					$db = new MongoClient('mongodb://localhost', array());
					$connection1 = $db->selectCollection("test", "recariofruits");
					$cursor = $connection1->find();
					
					foreach ($cursor as $doc) {
						// do something to each document
						$name = $doc['fruit_name'];
						$price = $doc['fruit_price'];
						$quantity = $doc['fruit_quantity'];
						$distributor = $doc['fruit_distributor'];
						$date = $doc['fruit_datelog'];
						$_id = $doc['_id'];
						$img = $doc['fruit_img'];
						
						if($img == null){
							$img = "default.jpg";
						}
						
						echo '
								<td><img class="circle" height="50px" src="images/'.$img.'">'.'<input type="hidden" value="'.$img.'" class="img'.$_id.'">'.'</td>
								<td >'.$name.'<input type="hidden" value="'.$name.'" class="name'.$_id.'">'.'</td>
								<td>'.$price.'<input type="hidden" value="'.$price.'" class="price'.$_id.'">'.'</td>
								<td>'.$quantity.'<input type="hidden" value="'.$quantity.'" class="quantity'.$_id.'">'.'</td>
								<td>'.$distributor.'<input type="hidden" value="'.$distributor.'" class="distributor'.$_id.'">'.'</td>
								<td><a href="mongodb_pricelog.php?fruit_id='.$_id.'">'.$date.'</a></td>
								<td><button class="btn-floating waves-effect waves-light btn modal-trigger edit" href="#modal2" value="'.$_id.'"><i class="mdi-image-edit left"></i></button></td>
								<td><a href="mongodb_delete.php?delete_id='.$_id.'" class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
							<tr>';
							
						
						// echo 'Fruit Name: '.$name.' Price: '.$price.' Quantity: '.$quantity.' Distributor: '.$distributor.' Date: '.$date."<br/>";
					}
					
					// $time_elapsed_secs = microtime(true) - $start;
					// echo $time_elapsed_secs;
				?>
            </tbody>
          </table>

        </div>

        <!-- END OF MONGODB -->

      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal-trigger').leanModal();
        
          $('.edit').click(function(){
            
            var a=$(this).val();
            $('#edit_mongodb_fruit_id').val(a);
            $('#edit_mongodb_fruit_name').val($('.name'+a).val());
            $('#edit_mongodb_fruit_price').val($('.price'+a).val());
            $('#edit_mongodb_fruit_quantity').val($('.quantity'+a).val());
            $('#edit_mongodb_fruit_distributor').val($('.distributor'+a).val());
            $('#edit_mongodb_fruit_image').val($('.img'+a).val());

          });
        });
      </script>
    </body>
  </html>