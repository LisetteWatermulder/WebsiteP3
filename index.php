<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Front-End Query</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            display: flex;
            gap: 20px;
        }
        .form-container, .output-container {
            width: 50%;
        }
        textarea {
            width: 100%;
            height: 200px;
        }
        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>PHP Front-End Query</h1>
    <div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <label for="query">Enter Query:</label><br>
                <textarea id="query" name="query" placeholder="Enter your query here..."></textarea><br>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="output-container">
            <h3>Output:</h3>
            <div style="border: 1px solid #ccc; padding: 10px; background: #f9f9f9;">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['query'])) {
                    $query = htmlspecialchars($_POST['query']);
                    echo "<strong>Query:</strong> " . $query . "<br><br>";

                    // Example of calling a procedure or querying a website
                    // Replace this with your actual logic
                    if ($query === "example") {
                        echo "This is an example response.";
                    } else {
                        echo "No matching procedure found for the query.";
                    }
                } else {
                    echo "Output will appear here.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html></div></body></html>