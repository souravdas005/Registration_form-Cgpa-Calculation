<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGPA Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        input[type="text"] {
            width: 80%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745; 
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            text-decoration: none;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <h3>
                <?php
                // Get marks from form
                $marks = [
                    $_POST['subject1'],
                    $_POST['subject2'],
                    $_POST['subject3'],
                    $_POST['subject4'],
                    $_POST['subject5']
                ];

                function calculate_grade_point($marks) {
                    if ($marks >= 80) return 4.0;
                    if ($marks >= 75) return 3.75;
                    if ($marks >= 70) return 3.5;
                    if ($marks >= 65) return 3.25;
                    if ($marks >= 60) return 3.0;
                    if ($marks >= 55) return 2.75;
                    if ($marks >= 50) return 2.5;
                    if ($marks >= 45) return 2.25;
                    if ($marks >= 40) return 2.0;
                    return 0.0; 
                }

                $total_grade_points = 0;

                foreach ($marks as $mark) {
                    $total_grade_points += calculate_grade_point($mark);
                }

                // Calculate average CGPA
                $average_cgpa = $total_grade_points / count($marks);
                echo "Your result is: " . number_format($average_cgpa, 2);
                ?>
            </h3>
            <a href="cgpa.php">Calculate Again</a>
        <?php else: ?>
            <h2>CGPA Calculator</h2>
            <form method="POST" action="">
                <input type="text" name="subject1" placeholder="Subject-1 Marks" required><br>
                <input type="text" name="subject2" placeholder="Subject-2 Marks" required><br>
                <input type="text" name="subject3" placeholder="Subject-3 Marks" required><br>
                <input type="text" name="subject4" placeholder="Subject-4 Marks" required><br>
                <input type="text" name="subject5" placeholder="Subject-5 Marks" required><br>
                <button type="submit">Calculate CGPA</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
