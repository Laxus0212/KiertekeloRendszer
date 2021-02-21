<?php

class nevekLista {

    function kilistaz($mit, $honnan, $oldal) {
        include '../adatbazisKapcsolat.php';
        $lekerdezes = mysqli_query($kapcsolat, "SELECT $mit FROM $honnan");

        echo '<form action="'.$oldal.'" method="post" style="height: auto; width: auto">
            <fieldset>
    <div class = "form-group">
<select multiple class = "form-control" size="20" id = "lista" name = "lista">';
        while ($adatok = mysqli_fetch_assoc($lekerdezes)) {

            if (isset($adatok)) {
                echo '<option>';
                foreach ($adatok as $adat) {
                    echo $adat;
//            var_dump($adatok);
                }
                echo '</option>';
            }
        }
        echo'
  </select>
  
</div>
<input type="submit" class="btn btn-primary ml-2" name="torol" value="Töröl">
</fieldset>
</form>
';
        
    }

}

//<div class = "form-group">
//<select multiple class = "form-control" id = "sel2" name = "sellist2">
//<option>1</option>
//</select>
//</div>
