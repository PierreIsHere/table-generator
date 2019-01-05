<!DOCTYPE html>
<html>
	<head>
		<title>Get HTML Table TR And TD Index</title>
		<meta charset="windows-1252">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<style>
            td:hover{background-color:#ddd;cursor: pointer}
            .selected{background-color: red;color: #fff;font-weight: bold}
        </style>
			</head>
			<body>
				<style>
          body { font: Arial; }
          th { background-color:#94989e;}
          td { font-size: 10pt;overflow: hidden; max-width: 1%; word-wrap: break-word;}
					tr:nth-child(odd) {background-color: #f2f2f2;}
					table {
						vertical-align: bottom;
						text-align: center;
						border-collapse: collapse;
						width: 100%;
						height: 100%

					}
					table, th, td {
  				border: 1px solid black;
					padding: 1%;
					}
          </style>
          <form method="post">
            <textarea name="input" rows="8" style="width: 93%; margin: 0px;"></textarea>
						<input type="submit" name="submit" style="width: 6%;height: 5vh;">
					</form>
          <table id="table">
						<?php
            if(isset($_POST['submit'])){
              $input = $_POST['input'];
              $input = str_replace('&', ' and ', $input);
              $array= explode("	",$input);
              $count = 0;

              foreach($array as $keys => $y){
                if(($keys % 7 ==0)&&($keys != 0)){
                  $array[$keys] = str_replace(chr(10),",",$array[$keys]);
                }

              }
              $temp = implode(",",$array);
              $array= explode(",",$temp);

              foreach ($array as $key => $value) {
                if($key <= 7){
                  echo "<th>".$value."</th>";
                }
                if($key >=8){
                  if($count == 0){
                  echo "<tr>";
                  }
                  echo "<td>".$value."</td>";
                  $count++;
                  if($count == 8){
                    echo "</tr>";
                    $count = 0;
                }
                }
              }
            }
						?>
          </table>

          <script>
          var table = document.getElementById("table");
          if (table != null) {
            for (var i = 0; i < table.rows.length; i++) {
                for (var j = 0; j < table.rows[i].cells.length; j++)
                table.rows[i].cells[j].onclick = function () {
                    tableText(this);
                };
            }
          }

          function tableText(tableCell) {
            var q = tableCell.innerHTML;
            window.open('http://google.com/search?q='+q);
          }

				</script>
			</body>
		</html>
