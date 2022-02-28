<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrapValidator.css"/>
  <!-- =============================================== -->
<script type="text/javascript" src="js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
  include "stadium-model.php";
    include "form.php";
    $frm=new formBuilder;      
  ?> 
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top" style="min-height:300px;padding:50px">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">Register</div>
				  <div class="panel-body">
				<form action="registration-process.php" method="post" id="regform">
				    <div class="form-group has-feedback">
                        

        <input name="name" type="text" size="25" placeholder="Name" class="form-control"/>
        <?php $frm->validate("name",array("required","label"=>"Name","regexp"=>"name")); // Validating form using form builder written in form.php ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
                    

      <div class="form-group has-feedback">
        <input name="address" type="text" size="25" placeholder="enter address" class="form-control"/>
<!--        --><?php //$frm->validate("address",array("required","label"=>"address","regexp"=>"address")); // Validating form using form builder written in form.php ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>


                    <div class="form-group has-feedback">
                        <input name="postcode" type="text" size="25" placeholder="Enter Post Code" class="form-control"/>
                        <?php $frm->validate("postcode",array("required","label"=>"PostCode","regexp"=>"postcode")); // Validating form using form builder written in form.php ?>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                   

      <div class="form-group has-feedback">
        <input name="phone" type="text" size="25" placeholder="Mobile Number" class="form-control"/>
        <?php $frm->validate("phone",array("required","label"=>"Mobile Number","regexp"=>"mobile")); // Validating form using form builder written in form.php ?>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
                    

      <div class="form-group has-feedback">
        <input name="email" type="text" size="25" placeholder="Email" class="form-control"/>
        <?php $frm->validate("email",array("required","label"=>"Email","email")); // Validating form using form builder written in form.php ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
                    
                    
      <div class="form-group has-feedback">
        <input name="password" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
        <?php $frm->validate("password",array("required","label"=>"Password","min"=>"7")); // Validating form using form builder written in form.php ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
                    
                    
      <div class="form-group has-feedback">
        <input name="cpassword" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
        <?php $frm->validate("cpassword",array("required","label"=>"Confirm Password","min"=>"7","identical"=>"password Password")); // Validating form using form builder written in form.php ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
          <button type="submit" name= "submitBtn" class="btn btn-primary">Register</button>
      </div>
      </div>
</div>
    </form>
			</div>
		</div>
		<div class="clear"></div>	
		
	</div>

</div>
<script>
        <?php $frm->applyvalidations("regform");?>
    </script>