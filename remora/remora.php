<?php 
    require_once 'settings.php';
    require_once 'lib.php';

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
    $curr_url = parse_url( urldecode( $_REQUEST["current"] ) );
    $refr_url = urldecode( $_REQUEST["referrer"] );


    create_event($visitor_id, $curr_url, $refr_url);

    print "visitorid=$visitor_id\n";

?>


