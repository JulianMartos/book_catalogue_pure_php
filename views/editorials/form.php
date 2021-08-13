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
        <label for="writeBookTitle" class="form-label">Editorial Name</label>
        <input type="text" class="form-control" id="writeBookInput" aria-describedby="Book Title" name="editorial_name" value="<?php echo $editorial_name?>"> 
    </div>
    <div class="mb-3">
        <label class="form-label" for="typePhone">Phone number input</label>
        <input type="tel" id="typePhone" class="form-control" name="editorial_phoneNumber" value="<?php  echo $editorial_phoneNumber ?>">
    </div>
    <div>
        <label for="writeBookTitle" class="form-label">Address</label>
        <input type="text" class="form-control" id="writeBookInput" aria-describedby="Book Title" name="editorial_address" value="<?php echo $editorial_address?>"> 
    </div>
    <div class="mb-3">
        <label for="selectEdit" class="form-label">Select Country</label>
        <select class="form-select" aria-label="Default select example" name="editorial_country">
            <option disabled selected value> -- select an option -- </option>
            <?php foreach ($countries as $key => $country) { ?>
            <option value="<?php echo $key; ?>" <?php if ($editorial_country === $key) echo "selected" ?> ><?php echo $country?></option>
            <?php }?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>