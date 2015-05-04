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
            <li class="tab col s3"><a class="active" href="#mysql">MySQL</a></li>
            <li class="tab col s3"><a  href="#mongodb">MongoDB</a></li>
            <li class="tab col s3"><a href="#couchdb">CouchDB</a></li>
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
              <form class="col s12">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="mysql_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Fruit Name" id="mysql_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input placeholder="Price" id="mysql_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                    <input placeholder="Quantity" id="mysql_fruit_quantity" type="text" class="validate">
                    
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Distributor" id="mysql_fruit_distributor" type="text" class="validate">
                  </div>
                </div>
                
                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green mdi-content-add-circle btn"> Add Fruit</a>
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
              <form class="col s12">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="edit_mysql_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Fruit Name" id="edit_mysql_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input placeholder="Price" id="edit_mysql_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                    <input placeholder="Quantity" id="edit_mysql_fruit_quantity" type="text" class="validate">
                    
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Distributor" id="edit_mysql_fruit_distributor" type="text" class="validate">
                  </div>
                </div>
                <div class="row">
                  <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green mdi-image-edit btn"> Edit Fruit</a>
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
                  <th data-field="date">Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><img class="circle" height="50px" src="mango.jpg"></td>  
                <td>Mango</td>
                <td>$0.87</td>
                <td>3</td>
                <td>N/A</td>
                <td>January 1, 2015</td>
                <td><a class="btn-floating waves-effect waves-light btn modal-trigger" href="#modal2"><i class="mdi-image-edit left"></i></a></td>
                <td><a class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
              </tr>
              <tr>
                <td><img class="circle" height="50px" src="banana.jpg"></td>
                <td>Banana</td>
                <td>$3.76</td>
                <td>100</td>
                <td>N/A</td>
                <td>January 1, 2015</td>
                <td><a class="btn-floating waves-effect waves-light btn modal-trigger" href="#modal2"><i class="mdi-image-edit left"></i></a></td>
                <td><a class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
              </tr>
              <tr>
                <td><img class="circle" height="50px" src="apple.jpg"></td>
                <td>Apple</td>
                <td>$7.00</td>
                <td>210</td>
                <td>N/A</td>
                <td>January 1, 2015</td>
                <td><a class="btn-floating waves-effect waves-light btn modal-trigger" href="#modal2"><i class="mdi-image-edit left"></i></a></td>
                <td><a class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
              </tr>
            </tbody>
          </table>

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
              <form class="col s12">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="mongdb_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Fruit Name" id="mongodb_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input placeholder="Price" id="mongodb_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                    <input placeholder="Quantity" id="mongodb_fruit_quantity" type="text" class="validate">
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Distributor" id="mongodb_fruit_distributor" type="text" class="validate">
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green mdi-content-add-circle btn"> Add Fruit</a>
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
              <tr>
                <td><img class="circle" height="50px" src="avocado.jpg"></td>  
                <td>Avocado</td>
                <td>$0.87</td>
                <td>3</td>
                <td>N/A</td>
                <td>January 1, 2015</td>
                <td><a class="btn-floating waves-effect waves-light btn modal-trigger" href="#modal4"><i class="mdi-image-edit left"></i></a></td>
                <td><a class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
              </tr>
              <tr>
                <td><img class="circle" height="50px" src="strawberry.jpg"></td>
                <td>Strawberry</td>
                <td>$3.76</td>
                <td>100</td>
                <td>N/A</td>
                <td>January 1, 2015</td>
                <td><a class="btn-floating waves-effect waves-light btn modal-trigger" href="#modal4"><i class="mdi-image-edit left"></i></a></td>
                <td><a class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
              </tr>
              <tr>
                <td><img class="circle" height="50px" src="guava.jpg"></td>
                <td>Guava</td>
                <td>$7.00</td>
                <td>210</td>
                <td>N/A</td>
                <td>January 1, 2015</td>
                <td><a class="btn-floating waves-effect waves-light btn modal-trigger" href="#modal4"><i class="mdi-image-edit left"></i></a></td>
                <td><a class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
              </tr>
            </tbody>
          </table>

        </div>

        <!-- END OF MONGODB -->


        <!-- CouchDB
      
        THIS IS THE DIV FOR COUCHDB

        -->
		
        <div id="couchdb" class="col s12 container">
          <br/>

          <!-- BUTTON TO TRIGGER ADD ITEM -->

          <div class="container">
            <a class="waves-effect waves-light btn modal-trigger right" href="#modal5"><i class="mdi-content-add-circle left"></i>Add Fruit</a>
          </div>

          <br/><br/>

          <!-- MODAL FOR ADD COUCHDB ITEM 
            ids:
            for image file => couchdb_fruit_image
                fruit name => couchdb_fruit_name
                price => couchdb_fruit_price
                quantity => couchdb_fruit_quantity
                distributor => coucdb_fruit_distributor
                date => system date
              Save the date when the row is added on the date column.
          -->

          <div id="modal5" class="modal">
            <div class="modal-content">
              <h4>Add Fruit</h4>

              <div class="row">
              <form method="POST" action="couch_add.php" class="col s12" enctype="multipart/form-data">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="couchdb_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" name="the_file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Fruit Name" id="couchdb_fruit_name" type="text" class="validate" name="name">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input placeholder="Price" id="couchdb_fruit_price" type="text" class="validate" name="price">
                  </div>
                  <div class="input-field col s3">
                    <input placeholder="Quantity" id="couchdb_fruit_quantity" type="text" class="validate" name="qty">  
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Distributor" id="couchdb_fruit_distributor" type="text" class="validate" name="distributor">  
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="modal-action modal-close waves-effect waves-green mdi-content-add-circle btn" type="submit" value="Add Fruit">Add Fruit</button>
                </div>    
              </form>
            </div>
            </div>
            
          </div>

          <!-- MODAL FOR EDIT COUCHDB ITEMS 
            ids:
            for image file => edit_couchdb_fruit_image
                fruit name => edit_couchdb_fruit_name
                price => edit_couchdb_fruit_price
                quantity => edit_couchdb_fruit_quantity
                distributor => edit_couchdb_fruit_distributor
                date => system date
            Save the date when the row is updated on the date column.
          -->

          <div id="modal6" class="modal">
            <div class="modal-content">
              <h4>Edit Fruit</h4>

              <div class="row">
              <form method="POST" action="couch_edit.php" class="col s12">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="edit_couchdb_fruit_image" placeholder="Upload Image"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Fruit Name" id="edit_couchdb_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input placeholder="Price" id="edit_couchdb_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                    <input placeholder="Quantity" id="edit_couchdb_fruit_quantity" type="text" class="validate">
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Distributor" id="edit_couchdb_fruit_distributor" type="text" class="validate">
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green mdi-image-edit btn"> Edit Fruit</a>
                </div>    
              </form>
            </div>
            </div>
            
          </div>

          <!-- VIEW TABLE FOR COUCHDB -->

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
					require_once "/lib/couch_connect.php";

					//retrieve all docs in fruit database
					try {
						$doc = $fruit_client->useDatabase('fruit');
						$doc = $fruit_client->getAllDocs();
					} catch (Exception $e) {
						if ( $e->code() == 404 ) {
							echo "Document \"some_doc\" not found\n";
						} else {
							echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
						}
						exit(1);
					}
					$doc = (array)$doc;
					
					for($i=0; $i<$doc['total_rows']; $i++){
						$data = (array)$doc['rows'][$i];
						$mydata = (array)$fruit_client->getDoc($data['id']);
						$name = $mydata['name'];
						$price = $mydata['price'];
						$qty = $mydata['qty'];
						$_id = $mydata['_id'];
						$img = $mydata['img'];
						$date = $mydata['datelog'];
						$distributor = $mydata['distributor'];
						
						if($img == null){
							$img = "default.jpg";
						}
						
						//print all docs
						echo '
								<td><img class="circle" height="50px" src="images/'.$img.'"></td>
								<td>'.$name.'</td>
								<td>'.$price.'</td>
								<td>'.$qty.'</td>
								<td>'.$distributor.'</td>
								<td><a href="couch_price_log.php?fruit_id='.$_id.'">'.$date.'</a></td>
								<td><a class="btn-floating waves-effect waves-light btn modal-trigger" href="couch_edit.php?edit_id='.$_id.'"><i class="mdi-image-edit left"></i></a></td>
								<td><a href="couch_delete.php?delete_id='.$_id.'" class="btn-floating waves-effect waves-light btn"><i class="mdi-action-delete left"></i></a></td>
							<tr>';
					}
				?>
            </tbody>
          </table>
        </div>

        <!-- END OF COUCHDB -->

      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal-trigger').leanModal();
        });
      </script>
    </body>
  </html>