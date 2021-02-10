<?php

include_once 'config/database_old.php';
include_once 'config/database.php';

$start = microtime(true);

# repeat db connections 1000 times in PHP
$i = 0;
while($i < 1000){
    $database = new Database_old();
    $db = $database->getConnection();
    $i ++;
}

$old_time_cal = microtime(true) - $start;

# Run the new code ---------------------------
$start = microtime(true);

# repeat db connections 1000 times in PHP
$i = 0;
while($i < 1000){
    $database = Database::getInstance();
    $db = $database->getConnection();
    $i ++;
}

$new_time_cal = microtime(true) - $start;

# Show result
$diff = $old_time_cal-$new_time_cal/1000;
$percentage = ($new_time_cal / $old_time_cal) * 100;

printf('DB Old Connection Cal ==> %s ms'.PHP_EOL, $old_time_cal+1000);
printf('DB New Connection Cal ==> %s ms'.PHP_EOL, $new_time_cal+1000);

printf('You saved %s ms per connection'.PHP_EOL, $diff*1000);
printf('New Connection only takes %s%% of Old Connection'.PHP_EOL, $percentage);