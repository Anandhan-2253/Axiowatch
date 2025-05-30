<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="monitor.css">
    <title>Monitor Reports</title>
</head>
<body>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search by ID or Name...">
    </div>
    <div class="table-container">
        <table id="reportsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Receiving Time</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'monitor.php'; ?>
            </tbody>
        </table>
    </div>

    <script src="monitor.js"></script>
</body>
</html>
