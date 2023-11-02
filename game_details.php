<?php
// Connect to the database
$mysqli = mysqli_connect("mi-linux.wlv.ac.uk", "2123563", "Prayer252525@@", "db2123563");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Check if the title of the game has been provided in the URL
if (isset($_GET['title'])) {
    $title = $_GET['title'];

    // Prepare and execute a query to fetch game details
    $query = "SELECT * FROM Games WHERE Title = '$title'";
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "MySQL error: " . mysqli_error($mysqli);
        exit;
    }

    if (mysqli_num_rows($result) == 0) {
        echo "Game not found.";
    } else {
        $gameDetails = mysqli_fetch_assoc($result);
        $title = $gameDetails['Title'];
        $genre = $gameDetails['Genre'];
        $price = number_format($gameDetails['prices'], 2);
        $description = ''; // Initialize the description variable

        // Assign descriptions based on the game title
        switch ($title) {
            case 'Grand Theft Auto V':
                $description = "Grand Theft Auto V is an action game known for its open-world gameplay, where players can explore a fictional city, engage in various criminal activities, and experience a richly detailed storyline.";
                break;
            case 'Elden Ring':
                $description = "Elden Ring is a highly anticipated open-world RPG created in collaboration between Hidetaka Miyazaki and George R. R. Martin. It is known for its rich lore, challenging gameplay, and vast open world.";
                break;
            case 'FC24':
                $description = "FIFA 23 is a popular football (soccer) simulation game that offers realistic gameplay and allows you to manage your favorite teams.";
                break;
            case 'The Sims 4':
                $description = "The Sims is a classic life simulation game where players can create and control virtual characters, build and customize their homes, and shape their lives in a sandbox-style environment.";
                break;
            case 'Ratchet & Clank: Rift Apart':
                $description = "Ratchet & Clank: Rift Apart is an action-adventure game featuring the iconic duo, Ratchet and Clank, as they traverse through various dimensions and engage in exciting adventures.";
                break;
        }
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>
                <?php echo $title; ?>
            </title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background: linear-gradient(to top left, #8457fc, #20d3fe) no-repeat fixed center;
                    text-align: center;
                }

                h1 {
                    color: #fff;
                    padding: 10px;
                }

                p {
                    margin: 10px;
                    color: #fff;
                }

                a {
                    text-decoration: none;
                    background-color: #667afd;
                    color: #fff;
                    padding: 5px 10px;
                }

                a:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>

        <body>
            <h1>
                <?php echo $title; ?>
            </h1>
            <?php
            if ($title === 'Grand Theft Auto V') {
                // Display the image for Grand Theft Auto V
                ?>
                <img src="https://www.igrandtheftauto.com/bigimage/4220/" alt="GTA V Image" style=" width: 482px; height: 248px;">
                <?php
            }
            if ($title === 'Elden Ring') {
                // Display the image for Elden Ring
                ?>
                <img src="https://cdn.wccftech.com/wp-content/uploads/2021/06/ER_KEY-ART-scaled-e1623411764381.jpg"
                    alt="GTA V Image" style=" width: 482px; height: 248px;">
                <?php
            }

            if ($title === 'FC24') {
                // Display the image for FC24
                ?>
                <img src="https://i.gadgets360cdn.com/large/ea_sportf_fc_24_cover_1689079417754.jpg" alt="GTA V Image"
                    style=" width: 482px; height: 248px;">
                <?php
            }
            if ($title === 'The Sims 4') {
                // Display the image for The Sims 4
                ?>
                <img src="https://images5.alphacoders.com/132/1325222.png" alt="GTA V Image" style=" width: 482px; height: 248px;">
                <?php
            }
            if ($title === 'Ratchet & Clank: Rift Apart') {
                // Display the image for Ratchet & Clank: Rift Apart
                ?>
                <img src="https://images3.alphacoders.com/115/1151394.jpg" alt="GTA V Image" style=" width: 482px; height: 248px;">
                <?php
            }
            ?>
            <!-- Display the game genre, price, and description -->
            <p><strong>Genre:</strong>
                <?php echo $genre; ?>
            </p>
            <p><strong>Price:</strong> $
                <?php echo $price; ?>
            </p>
            <p><strong>Description:</strong>
                <?php echo $description; ?>
            </p>

            <!-- Add more details here as needed -->

            <a href="index.php">Back to Game List</a>
        </body>

        </html>

        <?php
    } // end of else
} else {
    echo "Game title not provided in the URL.";
}
?>