<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Calculator</title>
  <style>
    
    body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .calculator {
            width: 300px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator h2 {
            text-align: center;
            margin-top: 0;
            padding-top: 10px;
            font-size: 24px;
            color: #333;
        }
        #display {
            width: calc(100% - 20px);
            margin: 0 auto;
            display: block;
            height: 60px;
            font-size: 24px;
            text-align: right;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 10px 10px 0 0;
            outline: none;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 5px;
            padding: 10px;
        }
        .buttons input[type="button"] {
            width: 70px;
            height: 50px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #eee;
            cursor: pointer;
            outline: none;
        }
        .buttons input[type="button"]:hover {
            background-color: #ddd;
        }
        .buttons input[type="button"].operator {
            background-color: #f1c40f;
            color: #fff;
        }
        .buttons input[type="button"].operator:hover {
            background-color: #d4ac0d;
        }

  </style>
</head>
<body>

<div class="calculator">
  <input type="text" id="display" readonly>
  <div class="buttons">
    <input type="button" value="7" onclick="addToDisplay('7')">
    <input type="button" value="8" onclick="addToDisplay('8')">
    <input type="button" value="9" onclick="addToDisplay('9')">
    <input type="button" value="6" onclick="addToDisplay('4')">
    <input type="button" value="5" onclick="addToDisplay('5')">
    <input type="button" value="4" onclick="addToDisplay('6')">
    <input type="button" value="3" onclick="addToDisplay('1')">
    <input type="button" value="2" onclick="addToDisplay('2')">
    <input type="button" value="1" onclick="addToDisplay('3')">
    <input type="button" value="0" onclick="addToDisplay('0')">
    <input type="button" value="." onclick="addToDisplay('.')">
    <input type="button" value="/" onclick="addToDisplay('/')" class="operator">
    <input type="button" value="-" onclick="addToDisplay('-')" class="operator">
    <input type="button" value="x" onclick="addToDisplay('*')" class="operator">
    <input type="button" value="+" onclick="addToDisplay('+')" class="operator">
    <input type="button" value="C" onclick="clearDisplay()">
    <input type="button" value="=" onclick="calculate()" class="operator">
  </div>
</div>

<script>
  function addToDisplay(value) {
    document.getElementById("display").value += value;
  }
  function clearDisplay() {
    document.getElementById("display").value = "";
  }

  function calculate() {
    var expression = document.getElementById("display").value;
   
    try {
      var result = eval(expression);
      document.getElementById("display").value = result;
    } catch (error) {
      alert("Invalid expression!");
      clearDisplay();
    }
  }
</script>

</body>
</html>
