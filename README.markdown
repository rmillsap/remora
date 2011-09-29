# Remora is an open-source event tracking framework

## How it works
Remora is a .js script file that publishes page loading activity to a server (written in PHP) for processing of asynchronous events.  

### How to include the Remora Tag
    <script language="JavaScript" src="http://path/to/remora.js" />
    
### Define Events in Remora
Use the Remora Scripting Language to define Events.

    <events>
        <event>
            <uri-match>/checkout</uri-match>
            <event-handler>CheckoutHandler</event-handler>
            <params>
                <param key="key1">value1</param>
            </param>
        </event>
    </events>