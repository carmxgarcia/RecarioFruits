<?php
	require_once "/lib/couch_connect.php";
	
	if(isset($_GET['edit_id'])){
		$id = $_GET['edit_id'];
		
		// retrieve doc to be deleted
		try {
			$doc = $fruit_client->getDoc($id);
		} catch (Exception $e) {
			if ( $e->code() == 404 ) {
				echo "Document \"some_doc\" not found\n";
			} else {
				echo "Something weird happened: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
			}
			exit(1);
		}
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
              <form method="POST" action="couch_edit_process.php" class="col s12" enctype="multipart/form-data">
                <div class="row">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text" id="couchdb_fruit_image" placeholder="<?php echo $doc->img ?>"/>
                    <div class="btn">
                      <span class="mdi-file-file-upload"></span>
                      <input type="file" name="the_file" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="<?php echo $doc->name ?>" name="edit_name" id="edit_couchdb_fruit_name" type="text" class="validate">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input value="<?php echo $doc->price ?>" name="edit_price" id="edit_couchdb_fruit_price" type="text" class="validate">
                  </div>
                  <div class="input-field col s3">
                    <input value="<?php echo $doc->qty ?>" name="edit_qty" id="edit_couchdb_fruit_quantity" type="text" class="validate">
                  </div>
                  <div class="input-field col s6">
                    <input value="<?php echo $doc->distributor ?>" name="edit_distributor" id="edit_couchdb_fruit_distributor" type="text" class="validate">
                  </div>
				  <input type="hidden" name="edit_id" value="<?php echo $id ?>">
                </div>
                <div class="modal-footer">
                  <input type="submit" value="Edit Fruit" class=" modal-action modal-close waves-effect waves-green mdi-image-edit btn">
                </div>    
              </form>
            </div>
            </div>
          </div>