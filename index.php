<?php
include "mySQL.php";
function newLine(){
    echo('<br>');
};

// Intro
echo ('<h2>Juan Orozco</h2>');
newLine();
echo ('<h4>FROM: WAMP</h4>');
newLine();
echo ('<h2>Assignment 4.3 DVD Titles/Actors and Listing</h2>');
newLine();


// DVD TITLES*******************************************************
echo('<h2>DVD Titles<h2/>');
//echo('Adding items to the dvdtitles table...');
//fInsertToDatabase('B000MMMT9G','Borat','19.99');
//fInsertToDatabase('B004SIP9KQ','Scary Movie 3','19.99');
//fInsertToDatabase('B000C20VRS','Scarface','19.99');
//fInsertToDatabase('B00G2P79BU','Bad Grandpa','19.99');
fListFromDatabase();
newLine();
newLine();
newLine();

// DVD ACTORS*******************************************************
echo('<h2>DVD Actors<h2/>');
// Borat
//fInsertToDatabaseActors('Sacha','Cohen');
//fInsertToDatabaseActors('Ken','Davitian');
// Scary Movie 3
//fInsertToDatabaseActors('Charlie','Sheen');
//fInsertToDatabaseActors('Anna','Faris');
// Scarface
//fInsertToDatabaseActors('Al','Pacino');
//fInsertToDatabaseActors('Steven','Bauer');
// Bad Grandpa
//fInsertToDatabaseActors('Johnny','Knoxville');
//fInsertToDatabaseActors('Jackson','Nicoll');
fListFromDatabaseActors();
newLine();
newLine();
newLine();

// DVD INFO (Relationship table)*******************************************************
echo('<h2>DVD Info</h2>');
// Borat
//fInsertToDVDInfo('B000MMMT9G',17);// Sacha Cohen
//fInsertToDVDInfo('B000MMMT9G',10);// Ken Davitian
// Scary Movie 3
//fInsertToDVDInfo('B004SIP9KQ',11);// Charlie Sheen
//fInsertToDVDInfo('B004SIP9KQ',12);// Anna Faris
// Scarface
//fInsertToDVDInfo('B000C20VRS',13);// Al Pacino
//fInsertToDVDInfo('B000C20VRS',14);// Steven Bauer
// Bad Grandpa
//fInsertToDVDInfo('B00G2P79BU',15);// Johny Knoxville
//fInsertToDVDInfo('B00G2P79BU',16);// Steven Bauer
fListFromDatabaseDVDInfo();

// DVD JOINED TO INFO (Full relationship)*******************************************************
echo('<h2>DVD Joined To Info</h2>');
fListFromDatabaseDVDAndActors();
