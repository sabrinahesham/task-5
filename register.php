<?php include "inc/header.php" ?>
 <?php include "inc/footer.php" ?>
 <?php include "inc/nav.php" ?>


    <h1> register page</h1>

    <div class="container">
<div class="row">
<div class="col-8 mx-auto my-5">
<h2 class="border p-2 my-2 text-center">Register</h2>
<?php
if(isset($_SESSION['errors'])):
     foreach($_SESSION['errors'] as $error): ?>
         <div class="alert alert-danger text-center">
            <?php echo $error; ?>
        </div>

     <?php
     endforeach;
endif;
unset($_SESSION[ 'errors']);
?>
<form action="handelers/handelRegister.php"  method="POST" class="border p-3">
<div class="form-group p-2 my-1">
<label for="name">Name</label>
<input type="text" name="name" class="form-control" id="name">
</div>
<div class="form-group P-2 my-1">
<label for="email">Email</label>
<input type="email" name="email" class="form-control" id="email">
</div>
<div class="form-group P-2 my-1">
<label for="password">Password</label>
<input type="password" name="password" class="form-control" id="password">
</div>
<div class="form-group P-2 my-1">
<input type="submit" value="Register" class="form-control">
</div>
</form>
