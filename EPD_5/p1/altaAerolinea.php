<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Epd_5_p1</title>
    </head>
    <body>

        <form method="get" action ="" name="alta">
            <select>
                <?php
                $f = fopen("ciudades.txt", 'r');
                if ($f) {
                    flock($f, LOCK_SH);
                    $ciudades = fgetcsv($f, 999, ",");
                    while (!feof($f)) {
                        $ciudades = fgetcsv($f, 999, ",");
                        ?>
                        <option value="Roma"><?php echo $ciudades[0] ?></option>
                        <option value="Paris"><?php echo $ciudades[1] ?></option>
                        <option value="Londres"><?php echo $ciudades[2] ?></option>
                        <option value="Dublin"><?php echo $ciudades[3] ?></option>
                        <option value="Sevilla"><?php echo $ciudades[4] ?></option>
                        <option value="Madrid"><?php echo $ciudades[5] ?></option>
                        <option value="Barcelona"><?php echo $ciudades[6] ?></option>
                        <option value="Amsterdam"><?php echo $ciudades[7] ?></option>
                        <?php
                    }

                    flock($f, LOCK_UN);
                    fclose($f);
                } else {
                    echo "error en el fichero";
                }
                ?>
            </select>
        </form>
    </body>
</html>

