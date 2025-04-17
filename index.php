<?php
require_once 'connector.php'; // Import the connector.php file

// Initialize the database connection
$db = new Database('localhost', 'dbuser', 'LkC9STj5n6bztQ', 'plugandplay');
$connection = $db->connect();

$buildDatabaseText = str_replace("'", "\'", str_replace('"', "'", str_replace("\n", '\n', file_get_contents('data/DDL.sql') . '\n\n' . file_get_contents('data/DML.sql'))));
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
        textarea {
            width: 100%;
            height: 200px;
            margin-bottom: 10px;
        }
        button {
            margin-bottom: 20px;
        }
        .output-container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table td, table th {
            padding: 8px;
            word-wrap: break-word;
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .result-box {
            border: 1px solid #ccc;
            padding: 10px;
            background: #f9f9f9;
            overflow-x: auto;
        }
    </style>
    <script>
        function InsertText(Id, Text) {
            var textarea = document.getElementById(Id);
            textarea.value = Text;
            textarea.focus();
        }
    </script>
</head>
<body>
    <div>
        <button onclick="InsertText('query', 'CALL CreateUser(\'j.doe\', \'Nowhere 4\', \'$2y$10$5BM1s.ZBEMqSltCPbIQb9erKxx5ac4xJgFg0MEderCt7XAolwW8wW\', \'1990-01-01\', \'j.doe@gmail.com\', \'John\', \'Doe\', \'06-01234567\', \'User\');')">Creëer nieuwe gebruiker</button>
        <button onclick="InsertText('query', 'CALL AddProduct(\'PlayGreen4\', 1, 8.00);')">Creëer nieuw product</button>
        <button onclick="InsertText('query', 'CALL CreateSupplier(\'Samsung Electronics\', \'Evert van de Beekstraat 310\', \'Nederland\', \'Jan Broekhuyzen\', \'06-86305474\');')">Creëer nieuwe leverancier</button>
        <button onclick="InsertText('query', 'CALL UpdateStock(\'PlayGreen3\', \'PlayGreen3\', 1);')">Update voorraad</button>
        <button onclick="InsertText('query', 'INSERT INTO `Order` (ReferenceNumber, Date, TotalPrice) VALUES (\'00112233\', \'2025-04-17\', 8.00);')">Creëer nieuwe bestelling</button>
        <button onclick="InsertText('query', 'INSERT INTO `Location` (`ChargingStationName`, `LocationName`, `LocationAddress`) \nVALUES (\'Den Bosch Centraal\', \'Den Bosch Centraal\', \'Stationsplein 147\');')">Nieuwe locatie</button>
        <button onclick="InsertText('query', 'SELECT * FROM `User`;')">Haal gebruikers op</button>
        <button onclick="InsertText('query', 'SELECT * FROM `Product`;')">Haal producten op</button>
        <button onclick="InsertText('query', 'SELECT * FROM `Supplier`;')">Haal leveranciers op</button>
        <button onclick="InsertText('query', 'CALL GenerateSalesReport(\'2025-01-01\', \'2025-12-31\');')">Genereer verkooprapport</button>
        <button onclick="InsertText('query', 'DELETE FROM `User` WHERE UserName = \'j.doe\';')">Verwijder gebruiker</button>
        <button onclick="InsertText('query', '<?php echo $buildDatabaseText; ?>')">Creëer database</button>
    </div>
    <div class="form-container">
        <form method="POST" action="">
            <label for="query">Enter Query:</label><br>
            <textarea id="query" name="query" placeholder="Enter your query here..."></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="output-container">
        <?php if (!empty($_POST['query'])): ?>
            <h2>Input:</h2>
            <div class="result-box">
                <?php echo $_POST['query']; ?>
            </div>
        <?php endif; ?>
        <h2>Output:</h2>
        <div class="result-box">
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
                    echo "<table border='1'>";
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
                    echo "<span style='color: green;'>Query executed successfully</span>";
                }
                } catch (PDOException $e) {
                    echo "<span style='color: red;'>Error executing query: " . htmlspecialchars($e->getMessage()) . "</span>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>