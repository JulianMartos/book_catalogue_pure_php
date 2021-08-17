<?php 
 
// Load the database configuration file 
require_once 'utils/database.php'; 
 
// Fetch records from database 
$statement = $pdo->prepare('SELECT b_id, title, dateOf_published, editorial.e_name , author.a_name, author.lastName FROM book_storage.book inner join book_storage.editorial  on editorial_id = editorial.id inner join author on author_id = author.id;');
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_ASSOC);


 
if( count($books) > 0){ 
    $delimiter = ","; 
    $filename = "books_data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Id', 'Title', 'Author', 'Editorial', 'Published'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    foreach ($books as $key => $book) {
        $lineData = array($key+1, $book['title'], $book["a_name"] .' ' . $book['lastName'], $book['e_name'], $book['dateOf_published']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     


    $statement = $pdo->prepare('SELECT count(b_id) as NumberOfBooks from book_storage.book;');
    $statement->execute();
    fputcsv($f, array('Number of Books in Catalog', $statement->fetch(PDO::FETCH_ASSOC)['NumberOfBooks']));
    
    
    $statement = $pdo->prepare('SELECT count(id) as NumberOfAuthors from book_storage.author;');
    $statement->execute();
    fputcsv($f, array('Number of Authors in Catalog', $statement->fetch(PDO::FETCH_ASSOC)['NumberOfAuthors']));
    
    
    $statement = $pdo->prepare('SELECT count(id) as NumberOfEdiitorial from book_storage.editorial;');
    $statement->execute();
    fputcsv($f, array('Number of Editorials in Catalog', $statement->fetch(PDO::FETCH_ASSOC)['NumberOfEdiitorial']));


    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>