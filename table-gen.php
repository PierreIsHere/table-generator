<!DOCTYPE html>
<html>
	<head>
		<title>Table Generator</title>
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
          th { background-color:#94989e;word-wrap: normal;}
          td { font-size: 10pt;overflow: hidden; max-width: 1%; word-wrap: normal;}
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
					padding: 0.5%;
					}
          </style>
          <form method="post">
						<textarea name="input" style="height:12vh;width: 93%;"></textarea>
						<input type="submit" name="submit" style="height:12.69vh;width: 6%;vertical-align:top;">
					</form>
          <table id="table">
						<?php
						include('HTML-DOM/simple_html_dom.php');
						function search($search_keyword){
						    $search_keyword=str_replace(' ','+',$search_keyword);
						    $newhtml =file_get_html("https://www.google.com/search?q=".$search_keyword."&tbm=isch");
						    $result_image_source = $newhtml->find('img', 0)->src;
						    echo '<td><img src="'.$result_image_source.'"></td>';
						}
						if(isset($_POST['submit'])){
						    $input = $_POST['input'];
						    $input = str_replace('&', ' and ', $input);
						    $input = str_replace('^', ' ', $input);
						    $array= explode("	",$input);
						    $count = 0;
						    $count1 = 0;
						    $count2=-4;
								$count4=1;
								$titleList = array();
								foreach ($array as $keys => $value) {
						        if(($keys % 7 ==0)&&($keys != 0)){
						            $array[$keys] = str_replace(chr(10),"^Qty: ",$array[$keys]);
						        }
						    }
								$temp = implode("^",$array);
						    for($i=0;$i<strlen($temp);$i++){
						        if($temp[$i]=="^"){
						            $count2++;
						            if($count2 % 9 ==0){
													if($count2 != 5){
														$temp = substr($temp,0,$i)."^##ImageHolder##".substr($temp,$i);
													}
						            }
						        }
						    }

						    $array= explode("^",$temp);
								for($i=3;$i<count($array);$i+=9){
									array_push($titleList,$array[$i]);
								}
								$array[4]= "Image";

						    foreach ($array as $key => $value) {
						        if($key <= 8){
						            echo "<th>".$value."</th>";
						        }
						        if($key >=9){
						            if($count == 0){
						                echo "<tr>";
						            }
												if($value!="##ImageHolder##"){
												echo "<td>".$value."</td>";

												}
						            if($value=="##ImageHolder##"){
													search($titleList[$count4]);
													$count4++;
						            }
						            $count++;
						            $count1++;
						            if($count == 9){
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
