<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <table border="2">
        <tr>
            <th colspan="4">
                Media de notas por alumno
                </th>
            </tr>
        <?php
        $m = array(
            0 => array(
                0 => 5,
                1 => 6,
                2 => 7
                
            ),
            1 => array(
                0 => 4,
                1 => 8,
                2 => 9
            ),
            2 => array(
                0 => 2,
                1 => 4,
                2 => 5
            ),
            
        );
        
        function funcion($m){
            
            
            for($i=0;$i<3;$i++){
                $sum = 0;
                echo "<tr>";
                for($j = 0;$j<3;$j++){
                     echo "<td>";
                    echo $m[$i][$j];
                    $sum +=$m[$i][$j];
                    
                    echo "</td>";
                  
                }
                echo "<td>";
                    echo $sum/3;
                   
                    echo "</td>";
                     
            echo "</tr>";}
                
            echo "<tr>";
            for($i=0;$i<3;$i++){
                    $sumasig = 0;
                    
              
                    for($j = 0;$j<3;$j++){
                        
                         $sumasig += $m[$j][$i];
                    }
                    echo "<td>";
                     echo $sumasig/3;
                    echo "</td>";
                     
    
            }
            echo "</tr>";
             
        } 
        
        funcion($m);
        ?>
       </table>
    </body>
</html>

