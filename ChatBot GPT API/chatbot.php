<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define predefined questions and answers
    $predefined_questions = array(
      

        require __DIR__ . '/vendor/autoload.php', // remove this line if you use a PHP Framework.
        
       
        $open_ai = new ('proj-awCmZqDJRKgg1sOn9nCCT3BlbkFJVvCzJqhvcukYGnKus7JY'), 
       
       $complete = $open_ai->completion([
           'model' => 'gpt-3.5-turbo-instruct',
           'prompt' => 'Hello',
           'temperature' => 0.9,
           'max_tokens' => 150,
           'frequency_penalty' => 0,
           'presence_penalty' => 0.6,
       ]),
       
       'echo $complete',
       
    
      "Who created you? => I was created by a team of skilled developers doing BIT at victoria University. they programmed me to understand and respond to user queries. My creators continue to refine and improve my capabilities over time.  
      The system was created by four students from Victoria University. Their names and registration numbers are:

Maze Masengo Elisee - VU-BIT-2109-0048
Tshilanda Tshikulumba - VU-BIT-2101-0519
Ahmed Abdirahman Shiekh Muse - VU-BSF-2209-0796-DAY
Nantabadde Catherine - VU-BIT-2109-0846
They contributed to the development of the system, each bringing their unique skills and expertise to the project.",

"What is victoria University => Victoria University is an institution of higher education located in Kampala, Uganda. It offers a variety of undergraduate and postgraduate programs in fields such as business, technology, health sciences, social sciences, and humanities. The university is known for its commitment to providing quality education and fostering innovation among its students.",

      


    );



    // Get user input from form
$question = $_POST['question'];

// Initialize variables to store the closest matching question and its corresponding answer
$closest_question = "";
$closest_answer = "";
$min_distance = PHP_INT_MAX;

// Iterate through predefined questions to find the closest match
foreach ($predefined_questions as $key => $value) {
    // Calculate Levenshtein distance between the user input and each predefined question
    $distance = levenshtein(strtolower($question), strtolower($key));

    // Update closest match if the distance is smaller than the current minimum distance
    if ($distance < $min_distance) {
        $closest_question = $key;
        $closest_answer = $value;
        $min_distance = $distance;
    }
}

// Display the closest matching answer
$answer = $closest_answer . "\n\n";

// Display the answer using JavaScript and clear previous answer
echo $answer ;
}



// require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

// use Orhanerday\OpenAi\OpenAi;


// $open_ai = new OpenAi('sk-proj-cfWjIvarOvjGHJ4GNu6NT3BlbkFJLS4Zw3VJaS2232GB29JH');

// $complete = $open_ai->completion([
//     'model' => 'gpt-3.5-turbo-instruct',
//     'prompt' => 'what is programming',
//     'temperature' => 0.9,
//     'max_tokens' => 150,
//     'frequency_penalty' => 0,
//     'presence_penalty' => 0.6,
//     ]);


?>