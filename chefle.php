<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        function getScore() {
            var ingredient = document.getElementById('ingredient').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    var rank = response[0];
                    var score = response[1];
                    document.getElementById("ingredient-name").innerHTML = ingredient;
                    document.getElementById("rank").innerHTML = rank;
                    document.getElementById("score").innerHTML = score.toFixed(2);
                }
            };
            xmlhttp.open("GET", "chefle_request.php?ingredient=" + ingredient, true);
            xmlhttp.send();

        }
    </script>

</head>

<body>

    <p><b>Enter an ingredient below:</b></p>
    <form action="">
        <label for="ingredient">Ingredient:</label>
        <input type="text" id="ingredient" name="ingredient">
        <div class='btn btn-primary' onenter="getScore()" onclick="getScore()">Submit</div>
    </form>
    <span id="results">
        <table style="width:50%">
            <tr>
                <th>Ingredient</th>
                <th> Rank </th>
                <th> Score </th>
            </tr>
            <tr>
                <td id="ingredient-name"></td>
                <td id="rank"></td>
                <td id="score"></td>
            </tr>
        </table>
    </span>
</body>

</html>