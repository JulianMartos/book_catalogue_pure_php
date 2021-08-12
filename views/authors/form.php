<?php 

// require_once '../../utils/database.php';

require_once "utils/countries.php";

$statement = $pdo->prepare('SELECT * FROM author');
$statement->execute();
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare('SELECT * FROM editorial');
$statement->execute();
$editorial = $statement->fetchAll(PDO::FETCH_ASSOC);


if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; 
var_dump($_POST)?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="writeBookTitle" class="form-label">Author Name</label>
        <input type="text" class="form-control" id="writeBookInput" aria-describedby="Book Title" name="author_name" value=<?php echo $author_name?>> 
    </div>
    <div class="mb-3">
        <label for="writeBookTitle" class="form-label">Author Last Name</label>
        <input type="text" class="form-control" id="writeBookInput" aria-describedby="Book Title" name="author_lastName" value=<?php echo $author_lastName?>> 
    </div>
    <div class="mb-3">
        <label class="form-label" for="typePhone">Phone number input</label>
        <input type="tel" id="typePhone" class="form-control" name="author_phoneNumber" value=<?php  echo $author_phoneNumber ?>>
    </div>
    <div>
        <label for="writeBookTitle" class="form-label">Address</label>
        <input type="text" class="form-control" id="writeBookInput" aria-describedby="Book Title" name="author_address" value=<?php echo $author_address?>> 
    </div>
    <div class="mb-3">
        <label for="selectEdit" class="form-label">Select Country</label>
        <select class="form-select" aria-label="Default select example" name="author_country">
            <option disabled selected value> -- select an option -- </option>
            <?php foreach ($countries as $key => $country) {?>
            <option value="<?php echo $key; ?>" <?php if ($author_country = $key) echo "selected" ?> ><?php echo $country?></option>
            <?php }?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>