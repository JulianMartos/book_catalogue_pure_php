<?php 

require_once "utils/countries.php";
if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; 
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="writeBookTitle" class="form-label">UserName</label>
        <input type="text" class="form-control" id="writeBookInput" aria-describedby="Book Title" name="username" value="<?php echo $user_name?>"> 
    </div>
    <div class="mb-3">
        <label class="form-label" for="typePhone">Password</label>
        <input type="password" id="typePass" class="form-control" name="password" placeholder="Type your password here">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>