<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBoard</title>
    <link rel="stylesheet" href="Style.css">
    <script>
        function displayAnswer(answer) {
            // Clear previous answer
            document.getElementById("answer").value = "";
            // Append new answer
            document.getElementById("answer").value += answer + "\n";
        }
    </script>
    <style>
        button{
            padding: 10px; 
            border: none;
            background-color: rgb(255, 255, 255);box-shadow: 0px 0px 9px -5px;  border-radius: 10px; 
            cursor:pointer;
            transition-duration: .3s;
        }
        button:hover{
            color: white;
            background-color: blue;
        }
    </style>
</head>
<body>
    <h1 class="titrage">INTERACTIVE CHATBOT </h1>

    <form id="chatForm">

        <p class="ask" style="margin-bottom: 10px;">Ask me anything</p>
        <div class="entry">
            <input type="text" placeholder="Enter Your Question" id="question" name="question" required> 
            <input class="submit" type="submit" value="Okay">
        </div>
        <!-- ---  --- -->
        <div class="Output">
            <textarea class="outcome" id="answer" style="margin-bottom: 10px;"></textarea>
        </div>

    </form>

    <button onclick="refreshPage()">Clear</button>

    <script>
        document.getElementById('chatForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var question = document.getElementById('question').value;

            // Send request to PHP script
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'chatbot.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Display response word by word
                    displayResponse(xhr.responseText);
                }
            };
            xhr.send('question=' + question);
        });

        // Function to display response word by word
        function displayResponse(response) {
            var words = response.split(' ');
            var index = 0;
            var interval = setInterval(function() {
                if (index < words.length) {
                    document.getElementById('answer').value += words[index] + ' ';
                    index++;
                } else {
                    clearInterval(interval);
                }
            }, 200); // Adjust delay between words as needed (in milliseconds)
        }
    function refreshPage() {
        location.reload();}
    </script>
</body>
</html>


