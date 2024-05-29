<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <input type="text" name="msg" id="msg_input">
        <button type="button" id="send_msg">Send</button>
    </form>

    <script src="//code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        var conn;
        $(document).ready(function() {
            conn = new WebSocket('ws://localhost:8080?access_token=enquiry-1');
            conn.onopen = function(e) {
                console.log("Connection established!");
            };

            conn.onmessage = function(e) {
                console.log(e.data);
            };

        })
        $(document).on('click','#send_msg',function(){
            var msg = $('#msg_input').val();
            conn.send(msg);
        })
    </script>
</body>
</html>