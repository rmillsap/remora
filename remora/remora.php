<?php 
    require_once '../config/settings.php';
    require_once '../lib/lib.php';

    // 1. Expire cookie in 90 days
    $expire  = time()+60*60*24*90;

    // 2. Expire the cookie NOW! (for testing)
    //setcookie("remora", 0, time()-1000*60*60 );
    
    // check for a session cookie
    if(!isset($_COOKIE["remora"])) {
        // create a new visitor cookie
        $visitor_id = create_visitor();
        setcookie("remora", $visitor_id, $expire );
    }else {
        $visitor_id = $_COOKIE["remora"];
    }
    
    // track the event
    create_event($visitor_id);

    print "visitorid=$visitor_id\n";

?>


