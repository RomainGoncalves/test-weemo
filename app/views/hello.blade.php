@extends('master')

@section('main')
  <h1>Weemo Contact list</h1>
    
    @if(Auth::user())
    
    {{ Auth::user()->username }}

    @endif

    <h2>My Contacts</h2>

    <ul>
        
        @if(isset($contacts))
            
            @foreach($contacts as $contact)
                <li>{{ $contact->username }} <button class="btn btn-primary" onClick="weemo.createCall('{{ strtolower($contact->username) }}', 'internal', '{{ $contact->username }}');">Call</button></li>
            @endforeach

        @endif

    </ul>


  <script type="text/javascript">
        // Initializze a object for current call
        var current_call = null;
/* Quick-Start: Step 3 */ 
        // Initialize the Main Object with WebAppIdentifier, Token, Debug and DisplayName
        var weemo = new Weemo("10badf8dce6c", "romain2", "internal");
 // Set this method to 1 if you want use the javascript console log
        weemo.setDebugLevel(1);
/* Quick-Start: Step 4 */ 
        weemo.initialize();

/* Quick-Start: Step 5 */ 
        weemo.onWeemoDriverNotStarted = function(downloadUrl) {
            alert('WeemoDriver not detected, copy and paste this following url on your browser: '+downloadUrl);
        };

        // Get the Connection Handler callback when the JavaScript is connected to WeempoDriver
        weemo.onConnectionHandler = function(message, code) {
            if(window.console)
                console.log("Connection Handler : " + message + ' ' + code);
            switch(message) {
/* Quick-Start: Step 6 */      
                // Authenticate token and webappId
                case 'connectedWeemoDriver':
                    weemo.authenticate();
                break; 
                case 'sipOk':
/* Quick-Start: Step 7-1 */                     
                    weemo.setDisplayName("Romain G")
/* Quick-Start: Step 7 */  
                // Create a conference room and report that user is connected
                    // weemo.createCall("hichem", "internal", "Hichem");
                    document.getElementById('stat').value = "User authenticate";
                break;
                case 'loggedasotheruser':
                // force connection, kick other logged users
                    weemo.authenticate(1);
                break;
            }
        }
        // Call Object is created by callback, this function permits to catch events comming from the call object
        weemo.onCallHandler = function(callObj, args) {
            
            current_call = callObj;
            if (args.type == "call" && args.status == "terminated") {
                document.getElementById('stat').value = "Call Terminated";
            }
        }       
    </script>

    <input type="text" id="stat" name="debug" maxlength="42"/>
    <br/>
    <!-- Send commands to call object -->
    <button type="button" onclick="current_call.videoStart();"> Show video </button>
    <button type="button" onclick="current_call.videoStop();"> Stop video </button>
    <button type="button" onclick="current_call.audioMute();"> Mute </button>
    <button type="button" onclick="current_call.audioUnMute();"> UnMute </button>
    <br/>
    <!-- Hang Up the call -->
    <button type="button" onclick="current_call.hangup();"> Hang Up </button>

@endsection