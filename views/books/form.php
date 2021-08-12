<?php 

// require_once '../../utils/database.php';

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
<?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="writeBookTitle" class="form-label">Book title</label>
        <input type="text" class="form-control" id="writeBookInput" aria-describedby="Book Title" name="title" value=<?php echo $book_title?>> 
    </div>
    <div class="mb-3">
        <label for="selectAuthors" class="form-label">Select Authors</label>
        <select class="form-select" aria-label="multiple select example" name="author">
            <option disabled selected value> -- select an option -- </option>
            <?php foreach ($authors as $key => $author) {?>
            <option value="<?php echo $author['id']; ?>"<?php if ($book_authors = $key) echo "selected" ?> ><?php echo $author['name'] . ' ' . $author['lastName']?></option>
      <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label for="selectEdit" class="form-label">Select Editorial</label>
        <select class="form-select" aria-label="Default select example" name="edit">
            <option disabled selected value> -- select an option -- </option>
            <?php foreach ($editorial as $edit['id'] => $edit) {?>
            <option value="<?php echo $key; ?>" <?php if ($book_edit = $key) echo "selected" ?> ><?php echo $edit['name'] . '-' . $edit['country']?></option>
            <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label for="selectPublishedDate" class="form-label">Was published on:</label>
        <input type="Date" class="form-control" id="selectPublishedDate" name="pub_date" value=<?php echo $book_pub_date?> >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>