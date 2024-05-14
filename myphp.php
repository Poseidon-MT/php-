<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Hesaplama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="number"] {
            width: 100px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Not Hesaplama</h2>
    <form method="post">
        <label for="vizeNotu">Vize Notu:</label>
        <input type="number" name="vizeNotu" id="vizeNotu" min="0" max="100" required><br>
        <label for="finalNotu">Final Notu:</label>
        <input type="number" name="finalNotu" id="finalNotu" min="0" max="100" required><br>
        <input type="submit" name="submit" value="Hesapla">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $vizeNotu = $_POST['vizeNotu'];
        $finalNotu = $_POST['finalNotu'];

        if (!is_numeric($vizeNotu) || !is_numeric($finalNotu)) {
            echo "<p>Lütfen geçerli notları giriniz.</p>";
        } else {
            $ortalama = ($vizeNotu * 0.4) + ($finalNotu * 0.6);
            $harfNotu;

            if ($ortalama >= 90) {
                $harfNotu = "AA";
            } elseif ($ortalama >= 85) {
                $harfNotu = "BA";
            } elseif ($ortalama >= 80) {
                $harfNotu = "BB";
            } elseif ($ortalama >= 75) {
                $harfNotu = "CB";
            } elseif ($ortalama >= 70) {
                $harfNotu = "CC";
            } elseif ($ortalama >= 65) {
                $harfNotu = "DC";
            } elseif ($ortalama >= 60) {
                $harfNotu = "DD";
            } elseif ($ortalama >= 55) {
                $harfNotu = "FD";
            } else {
                $harfNotu = "FF";
            }

            echo "<div>";
            echo "<p>Ortalama: " . number_format($ortalama, 2) . "</p>";
            echo "<p>Harf Notu: " . $harfNotu . "</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>
