# Remora is an open-source event tracking framework

## How it works
Remora is a .js script file that publishes page loading activity to a server (written in PHP) for processing of asynchronous events.  

### How to include the Remora Tag
    <script language="JavaScript" src="http://path/to/remora.js" />
    
### Define event handlers to process offline data
Use the Remora Scripting Language to define asynchronous occurrences of events

    <event-rule name="Record Product Views">
        <!-- checks asynchronously for matches -->
        <uri-like>products/*</uri-like>

        <!-- calls an event-handler class -->
        <call>eventhandler_onProductLoad</call>
    </event-rule>

    
# How to Install

1. Define your database settings [MySQL 5+](http://www.mysql.com) in 
    config/settings.php
    
2. Run the install command from the Remora directory
    php bin/install.php
    

# If you have any questions or would like to contribute contact robby[at]missionsolutions[dot-com]

Thanks!
~ Sap

    