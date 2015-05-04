<?php
	$dbhost = 'localhost';
	$dbname = 'test';
	
	$db1 = new MongoClient('mongodb://localhost', array());
	$connection1 = $db1->selectCollection("test", "recariofruits");
	$cursor = $connection1->find( array('_id' => new MongoID($_GET['edit_id'])));
	
	foreach ($cursor as $doc) {
		// do something to each document
		$name = $doc['fruit_name'];
		$price = $doc['fruit_price'];
		$quantity = $doc['fruit_quantity'];
		$distributor = $doc['fruit_distributor'];
		$date = $doc['fruit_datelog'];
		$_id = $doc['_id'];
		$img = $doc['fruit_img'];
	}
	
	if($img == null){
		$img = "default.jpg";
	}
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </head>

    <body>      
		<div >
            <div class="modal-content">
              <h4>Edit Fruit</h4>

              <div class="row">
              <form method="POST" action="mongodb_edit_process.php" class="col s12" enctype="multipart/form-data">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="mongodb_fruit_image" placeholder="<?php echo $img ?>"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" name="the_file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="<?php echo $name ?>" name="edit_name" id="edit_mongodb_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input value="<?php echo $price ?>" name="edit_price" id="edit_mongodb_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                    <input value="<?php echo $quantity ?>" name="edit_quantity" id="edit_mongodb_fruit_quantity" type="text" class="validate">
                  </div>
                  <div class="input-field col s6">
                    <input value="<?php echo $distributor ?>" name="edit_distributor" id="edit_mongodb_fruit_distributor" type="text" class="validate">
                  </div>
				  <input type="hidden" name="edit_id" value="<?php echo $_id ?>">
                </div>
                <div class="modal-footer">
                  <input type="submit" value="Edit Fruit" class=" modal-action modal-close waves-effect waves-green mdi-image-edit btn">
                </div>    
              </form>
            </div>
            </div>
          </div>