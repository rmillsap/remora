<?php 

// Create a VISITOR
function create_visitor() {
    $mysqli = db_connect();
    
    // insert
    $mysqli->query("INSERT INTO visitor (remote_host, referring_url, user_agent) VALUES ('" .
    $_SERVER['REMOTE_ADDR'] . "', '".$_SERVER['HTTP_REFERER']."', '".$_SERVER['HTTP_USER_AGENT']."')");
    
        
    $new_id = $mysqli->insert_id;
    // close
    $mysqli->close();
    
    return $new_id;
}

// CREATE an EVENT
function create_event($visitor_id, $curr_url, $refr_url) {
    $mysqli = db_connect();    
    

    $uri = $_SERVER['REQUEST_URI'];
    if(strpos($uri, '?') > 0 ) {
        $uri = substr($uri, 0, strpos($uri, '?'));
    }

    $sql = "INSERT INTO event (visitor_id, server_host, server_uri, querystring, is_get_request, page_load_millis, page_size_bytes, referring_url)"
                . " VALUES ( "
                . $visitor_id           .","
                . q($curr_url["host"])  .","
                . q($curr_url["path"])  .","
                . q($curr_url["query"]) .", 1, 0, 0, ". q($refr_url) .")";
    
    // insert
    $mysqli->query( $sql );

    // close
    $mysqli->close();
}

function db_init() {
    $mysqli = db_connect(null, null);
    $mysqli->query("CREATE DATABASE IF NOT EXISTS " .DBNAME);
    $mysqli->close();
    
    exec("mysql -u " . DBUSER . " " . DBNAME . " < config/remora.sql" );
}

function db_connect($dbname=DBNAME, $dbport=DBPORT) {
    
    print_info("Attempting to connect to " . DBNAME . "@".DBHOST);

    $mysqli = new mysqli(
        DBHOST, 
        DBUSER, 
        DBPASS, 
        $dbname);

    if( $mysqli->connect_error ) 
        print_error("Was unable to connect to your db defined in config/settings.php. Double-check your settings!");
    
    return $mysqli;
}

function print_info($message) {
    if(IS_DEVELOPMENT == "true")    
        print "\n\x1B[01;32m REMORA >> $message \x1B[0m\n\n";
}

function print_error($message) {
    print "\n\033[01;31m REMORA >> $message \033[0m\n\n";
}

function q($value) {
        return "'$value'";
}

?>