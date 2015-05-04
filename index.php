<!-- 

DEAR GROUPMATES, this is already well-documented (I think?).
Search for your specific database ex: "mysql" and you will see the div where the view for that specific database is coded(?).
Please document your works. And please use unique IDs. Thank you. 

PS: I will fix the color scheme and the logo soon.

-->


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

          <!-- MODAL FOR ADD COUCHDB ITEM 
            ids:
            for image file => mongodb_fruit_image
                fruit name => mongodb_fruit_name
                price => mongodb_fruit_price
                quantity => mongodb_fruit_quantity
                distrubutor => mongodb_fruit_distributor
                date => system date

                Save the date when the row is added on the date column.
          -->

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
                      <input type="file" name="the_file"/>
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
                  <input class="modal-action modal-close waves-effect waves-green mdi-content-add-circle btn" type="submit" value="Add Fruit">
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

          <div id="modal4" class="modal">
            <div class="modal-content">
              <h4>Edit Fruit</h4>

              <div class="row">
              <form class="col s12">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="edit_mongodb_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Fruit Name" id="edit_mongodb_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input placeholder="Price" id="edit_mongodb_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                    <input placeholder="Quantity" id="edit_mongodb_fruit_quantity" type="text" class="validate"> 
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Distributor" id="edit_mongodb_fruit_distributor" type="text" class="validate"> 
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green mdi-image-edit btn"> Edit Fruit</a>
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
								<td><img class="circle" height="50px" src="images/'.$img.'"></td>
								<td>'.$name.'</td>
								<td>$'.$price.'</td>
								<td>'.$quantity.'</td>
								<td>'.$distributor.'</td>
								<td><a href="mongodb_pricelog.php?fruit_id='.$_id.'">'.$date.'</a></td>
								<td><a class="btn-floating waves-effect waves-light btn modal-trigger" href="mongodb_edit.php?edit_id='.$_id.'"><i class="mdi-image-edit left"></i></a></td>
								<td><a href="mongodb_delete.php?delete_id='.$_id.'" class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
							<tr>';
						// echo 'Fruit Name: '.$name.' Price: '.$price.' Quantity: '.$quantity.' Distributor: '.$distributor.' Date: '.$date."<br/>";
					}
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
        });
      </script>
    </body>
  </html>