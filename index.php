<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            max-width: 300px; 
            margin: auto; 
        }
        input {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            text-align: right;
            background-color: #333;
            color: #fff;
            width: 100%;
            border: none;
            margin-bottom: 10px; 
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 10px;
        }
        button {
            width: calc(25% - 11px);
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        .number {
            background-color: #ddd;
        }
        .number:hover {
            background-color: #ccc;
        }
        .operation {
            background-color: #f90;
        }
        .operation:hover {
            background-color: #f80;
        }
        .zero-button {
            width: calc(75% - 11px); 
        }
        .equals-button {
            width: calc(100% - 11px); 
        }
    </style>
</head>
<body>
    <form method="post">
        <input type="text" name="display" value="<?php echo isset($_POST['display']) ? $_POST['display'] : ''; ?>">
        <div class="row">
            <button class="operation" name="pressed" value="AC">C</button>
            <button class="operation" name="pressed" value="+/-">+/-</button>
            <button class="operation" name="pressed" value="%">%</button>
            <button class="operation" name="pressed" value="÷">÷</button>
        </div>
        <div class="button-container">
            <button class="number" name="pressed" value="7">7</button>
            <button class="number" name="pressed" value="8">8</button>
            <button class="number" name="pressed" value="9">9</button>
            <button class="operation" name="pressed" value="×">x</button>
            <button class="number" name="pressed" value="4">4</button>
            <button class="number" name="pressed" value="5">5</button>
            <button class="number" name="pressed" value="6">6</button>
            <button class="operation" name="pressed" value="-">-</button>
            <button class="number" name="pressed" value="1">1</button>
            <button class="number" name="pressed" value="2">2</button>
            <button class="number" name="pressed" value="3">3</button>
            <button class="operation" name="pressed" value="+">+</button>
            <button class="zero-button" name="pressed" value="0">0</button>
            <button class="number" name="pressed" value=",">,</button>
            <button class="equals-button" name="pressed" value="=">=</button>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $display = $_POST['display'];
        $pressed = $_POST['pressed'];

        if ($pressed == 'AC') {
            $display = '';
        } elseif ($pressed == '+/-') {
            $display = $display * -1;
        } elseif ($pressed == '%') {
            $display = $display / 100;
        } elseif ($pressed == '=') {
            $display = eval('return ' . str_replace(['÷', '×', ','], ['/', '*', '.'], $display) . ';');
        } else {
            $display .= $pressed;
        }
        echo "<script>document.getElementsByName('display')[0].value = '$display';</script>";
    }
    ?>
</body>
</html>
