<?php
include 'dbConnect.php';
// database functions ************************************************
//Notes:
// If you delete from either titles or actors, that changes the relationship table
// You can insert One at a time just fine though


// DVD Titles table******************************************************************
function fInsertToDatabase($asin,$title,$price) {

  $sql = "INSERT INTO dvdtitles (asin, title, price) VALUES ('$asin', '$title', $price)";

  // TODO: Fill in the rest of the function
    $db = fConnectToDatabase();
    $db->query($sql);
}

function fDeleteFromDatabase($deleteID) {

    // Delete from table
    $sql = "DELETE FROM dvdtitles WHERE asin = "."'".$deleteID."'";
    // Delete from relationship table
    $sqlInfoTable = "DELETE FROM dvdinfo WHERE asin = "."'".$deleteID."'";
    $db = fConnectToDatabase();
    $db->query($sql);
    $db->query($sqlInfoTable);
}

function fListFromDatabase() {
    $db = fConnectToDatabase();
    $newLine = '<br>';
    $sql = 'SELECT * FROM dvdtitles;';
    echo ($newLine);
    $num = 1;
    echo('Showing Items in TABLE: dvdtitles');
    echo ($newLine);
    foreach($db->query($sql)as $row){
        echo('Item: '.$num);
        echo ($newLine);
        echo('-------------------------------------------');
        echo ($newLine);
        echo('ASIN:  '.$row['asin']."\t");
        echo ($newLine);
        echo('TITLE:  '.$row['title']."\t");
        echo ($newLine);
        echo('PRICE:  '.$row['price']."\t");
        echo ($newLine);
        echo('-------------------------------------------');
        echo ($newLine);
        $num++;
    }
}



// Actors Table******************************************************************
function fInsertToDatabaseActors($fname,$lname) {

    $sql = "INSERT INTO dvdactors (fname, lname) VALUES ('$fname', '$lname')";

    // TODO: Fill in the rest of the function
    $db = fConnectToDatabase();
    $db->query($sql);
}

function fDeleteFromDatabaseActors($deleteID) {
    // Delete from table
    $sql = "DELETE FROM dvdactors WHERE actorID = ".$deleteID;
    $sqlInfo = "DELETE FROM dvdinfo WHERE actorID = ".$deleteID;
    $db = fConnectToDatabase();
    $db->query($sql);
    $db->query($sqlInfo);

}

function fListFromDatabaseActors() {
    $db = fConnectToDatabase();
    $newLine = '<br>';
    $sql = 'SELECT * FROM dvdactors;';
    echo ($newLine);
    $num = 1;
    echo('Showing Items in TABLE: dvdactors');
    echo ($newLine);
    foreach($db->query($sql)as $row){
        echo('Item: '.$num);
        echo ($newLine);
        echo('-------------------------------------------');
        echo ($newLine);
        echo('ACTORID:  '.$row['actorID']."\t");
        echo ($newLine);
        echo('First Name:  '.$row['fname']."\t");
        echo ($newLine);
        echo('Last Name:  '.$row['lname']."\t");
        echo ($newLine);
        echo('-------------------------------------------');
        echo ($newLine);
        $num++;
    }
}



// Relationship Table******************************************************************
function fInsertToDVDInfo($asin, $actorID){
    $sql = "INSERT INTO dvdinfo (asin, actorID) VALUES ('$asin', $actorID)";

    // TODO: Fill in the rest of the function
    $db = fConnectToDatabase();
    $db->query($sql);
}

function fDeleteDVDInfo($asin, $actorID){
    $sql = "DELETE FROM dvdinfo WHERE actorID = ".$actorID." AND asin = "."'$asin'";
    // TODO: Fill in the rest of the function
    $db = fConnectToDatabase();
    $db->query($sql);
}

function fListFromDatabaseDVDInfo() {
    $db = fConnectToDatabase();
    $newLine = '<br>';
    $sql = 'SELECT * FROM dvdinfo;';
    echo ($newLine);
    $num = 1;
    echo('Showing Items in TABLE: dvdinfo');
    echo ($newLine);
    foreach($db->query($sql)as $row){
        echo('Item: '.$num);
        echo ($newLine);
        echo('-------------------------------------------');
        echo ($newLine);
        echo('ASIN:  '.$row['asin']."\t");
        echo ($newLine);
        echo('ACTORID:  '.$row['actorID']."\t");
        echo ($newLine);
        echo('-------------------------------------------');
        echo ($newLine);
        $num++;
    }
}

// RELATIONSHIP******************************************************************
function fListFromDatabaseDVDAndActors() {
    $db = fConnectToDatabase();
    $newLine = '<br>';
    $sql = "
      SELECT 
	      tt.asin, tt.title, tt.price, concat(a.fname,' ',a.lname ) as actor
      FROM 
	      dvdinfo i
      INNER JOIN dvdtitles tt on tt.asin = i.asin
      INNER JOIN dvdactors a on a.actorID = i.actorID";
    echo ($newLine);
    $num = 1;
    echo('Showing Join Table');
    echo ($newLine);
    foreach($db->query($sql)as $row){
        echo('Item: '.$num);
        echo ($newLine);
        echo('-------------------------------------------');
        echo ($newLine);
        echo('ASIN:  '.$row['asin']."\t");
        echo ($newLine);
        echo('TITLE:  '.$row['title']."\t");
        echo ($newLine);
        echo('PRICE:  '.$row['price']."\t");
        echo ($newLine);
        echo('ACTOR:  '.$row['actor']."\t");
        echo ($newLine);
        echo('-------------------------------------------');
        echo ($newLine);
        $num++;
    }
}