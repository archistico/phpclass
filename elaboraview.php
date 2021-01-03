<?php
header("Content-Type: text/plain");

function controlla($val) {
    // ok se non è stringa vuota
    if(strlen($val)!=0) {
        return true;
    } else {
        return false;
    }
}

$tipo = array();
$name = array();
$testo_placeholder = array();
$minimo = array();
$massimo = array();
$step = array();
$valore = array();
$gruppo = array();
$option_text = array();
$option_value = array();

for($c=0;$c<=20;$c++) {
    if(!empty($_GET['tipo'.$c]) && !empty($_GET['name'.$c])) {
        $tipo[] = $_GET['tipo'.$c];
        $name[] = $_GET['name'.$c];

        $testo_placeholder[] = $_GET['testo_placeholder'.$c];

        $minimo[] = $_GET['minimo'.$c];
        $massimo[] = $_GET['massimo'.$c];
        $step[] = $_GET['step'.$c];
        $valore[] = $_GET['valore'.$c];
        
        $gruppo[] = $_GET['gruppo'.$c];
        $option_text[] = $_GET['option_text'.$c];
        $option_value[] = $_GET['option_value'.$c];
    }    
}

for($c=0;$c<count($name);$c++) {

    if($tipo[$c]=='Text') {
        echo '<div class="row">'."\n";
        echo '   <div class="col-md-12">'."\n";
        echo '      <div class="form-group">'."\n";
        echo '         <label for="'.strtolower($name[$c]).'">'.ucwords($name[$c]).'</label>'."\n";
        echo '         <input type="text" class="form-control" id="'.strtolower($name[$c]).'" placeholder="'.$testo_placeholder[$c].'" name="'.strtolower($name[$c]).'">'."\n";
        echo '      </div>'."\n";
        echo '   </div>'."\n";
        echo '</div>'."\n";
    }

    if($tipo[$c]=='Number') {
        echo '<div class="row">'."\n";
        echo '   <div class="col-md-12">'."\n";
        echo '      <div class="form-group">'."\n";
        echo '         <label for="'.strtolower($name[$c]).'">'.ucwords($name[$c]).'</label>'."\n";
        echo '         <input type="number" class="form-control" id="'.strtolower($name[$c]).'" name="'.strtolower($name[$c]).'"';
        if(controlla($valore[$c])) {
            echo           ' value='.$valore[$c];
        }
        if(controlla($minimo[$c])) {
            echo           ' min='.$minimo[$c];
        }
        if(controlla($massimo[$c])) {
            echo           ' max='.$massimo[$c];
        }
        if(controlla($step[$c])) {
            echo           ' step='.$step[$c];
        }        
        echo           '>'."\n";
        echo '      </div>'."\n";
        echo '   </div>'."\n";
        echo '</div>'."\n";
    }

    if($tipo[$c]=='Date') {
        echo '<div class="row">'."\n";
        echo '   <div class="col-md-12">'."\n";
        echo '      <div class="form-group">'."\n";
        echo '         <label for="'.strtolower($name[$c]).'">'.ucwords($name[$c]).'</label>'."\n";
        echo '         <input type="date" class="form-control" id="'.strtolower($name[$c]).'" name="'.strtolower($name[$c]).'">'."\n";
        echo '      </div>'."\n";
        echo '   </div>'."\n";
        echo '</div>'."\n";
    }

    if($tipo[$c]=='Select') {
        echo '<div class="row">'."\n";
        echo '   <div class="col-md-12">'."\n";
        echo '      <div class="form-group">'."\n";
        echo '         <label for="'.strtolower($name[$c]).'">'.ucwords($name[$c]).'</label>'."\n";
        echo '         <select class="form-control select2" id="'.strtolower($name[$c]).'" name="'.strtolower($name[$c]).'">'."\n";
        echo '            <repeat group="{{ @'.strtolower($gruppo[$c]).' }}" value="{{ @elemento }}">'."\n";
        echo '               <option value="{{ @elemento.'.strtolower($option_value[$c]).' }}">{{ @elemento.'.strtolower($option_text[$c]).' }}</option>'."\n";
        echo '            </repeat>'."\n";
        echo '         </select>'."\n";
        echo '      </div>'."\n";
        echo '   </div>'."\n";
        echo '</div>'."\n";
    }
}
