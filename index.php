<?php
require_once 'connector.php'; // Import the connector.php file

// Initialize the database connection
$db = new Database('localhost', 'dbuser', 'LkC9STj5n6bztQ', 'plugandplay');
$connection = $db->connect();
?>

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
                    $query = $_POST['query'];

                    try {
                        // Execute the query
                        $stmt = $connection->prepare($query);
                        $stmt->execute();

                        // Fetch and display results
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($results) {
                            echo "<table border='1' cellpadding='5' cellspacing='0'>";
                            echo "<tr>";
                            foreach (array_keys($results[0]) as $column) {
                                echo "<th>" . htmlspecialchars($column) . "</th>";
                            }
                            echo "</tr>";
                            foreach ($results as $row) {
                                echo "<tr>";
                                foreach ($row as $value) {
                                    echo "<td>" . htmlspecialchars($value) . "</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "Query executed successfully, but no results found.";
                        }
                    } catch (PDOException $e) {
                        echo "Error executing query: " . htmlspecialchars($e->getMessage());
                    }
                } else {
                    echo "Output will appear here.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>