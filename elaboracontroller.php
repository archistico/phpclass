<?php
header("Content-Type: text/plain");

function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\_]/', '', $string); // Removes special chars.

    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

$send_campi = $_GET['campi'];
$send_name_space = $_GET['name_space'];
$send_nome_classe = $_GET['nome_classe'];

$array_campi = explode("\n", $send_campi);
$campi = [];
foreach ($array_campi as $c) {
    $str = trim(clean($c));
    if (!empty($str)) {
        $campi[] = $str;
    }
}

echo "<?php\n";
// NAMESPACE
echo "\n";
echo "namespace $send_name_space\\" . $send_nome_classe . ";\n";
echo 'use \app\Helper\Utilita;' . "\n";
echo "\n";

// CLASSE
echo "class " . ucwords($send_nome_classe) . " \n{" . "\n";





// NUOVO
echo '   public function Nuovo($f3) {' . "\n";
echo "      \$f3->set('titolo', '" . ucwords($send_nome_classe) . "');" . "\n";
echo "      \$f3->set('contenuto', '" . ucwords($send_nome_classe) . "/" . ucwords($send_nome_classe) . "_nuovo.htm');" . "\n";
echo "      \$f3->set('script', '" . ucwords($send_nome_classe) . "_nuovo.js');" . "\n";
echo "      echo \Template::instance()->render('../app/View/Generic/Base.htm');" . "\n";

// CHIUDI NUOVO
echo '   }' . "\n\n";





// NUOVODB
echo '   public function NuovoDb($f3) {' . "\n";

foreach ($campi as $c) {
    if($c == $campi[0]) {
        // il primo lo elimino
    } else {
        echo "      \$" . $c. " = \$f3->get('POST.". $c."');\n";
    }
}

echo '      $'.strtolower($send_nome_classe)." = new \app\Model\\".ucwords($send_nome_classe)."(";
foreach ($campi as $c) {
    if($c == $campi[0]) {
        echo "null, ";
    } else {
        if($c == end($campi)) {
            echo "\$" . $c."";
        } else {
            echo "\$" . $c.", ";
        }
        
    }
}
echo ');'."\n";
echo '      $'.strtolower($send_nome_classe)."->Insert();"."\n";

echo '' . "\n";

echo "      \app\Helper\Flash::instance()->addMessage('" . ucwords($send_nome_classe) . " aggiunto', 'success');" . "\n";
echo "      \$f3->reroute('@" . strtolower($send_nome_classe) . "_lista');\n";

// CHIUDI NUOVODB
echo '   }' . "\n\n";






// MODIFICA
echo '   public function Modifica($f3, $params) {' . "\n";

echo "      \$id" . strtolower($send_nome_classe) . " = \$params['id'];" . "\n";
echo '      $elemento = \app\Model\\'. ucwords($send_nome_classe) ."::SelectById(\$id". strtolower($send_nome_classe).");" . "\n";    
echo "      \$f3->set('elemento', \$elemento);" . "\n";

echo '' . "\n";

echo "      \$f3->set('titolo', '" . ucwords($send_nome_classe) . "');" . "\n";
echo "      \$f3->set('contenuto', '" . ucwords($send_nome_classe) . "/" . ucwords($send_nome_classe) . "_modifica.htm');" . "\n";
echo "      \$f3->set('script', '" . ucwords($send_nome_classe) . "_modifica.js');" . "\n";
echo "      echo \Template::instance()->render('../app/View/Generic/Base.htm');" . "\n";

// CHIUDI MODIFICA
echo '   }' . "\n\n";





// MODIFICADB
echo '   public function ModificaDb($f3, $params) {' . "\n";

echo "      \$id" . strtolower($send_nome_classe) . " = \$params['id'];" . "\n";

echo '' . "\n";

foreach ($campi as $c) {
    if($c == $campi[0]) {
        // il primo lo elimino
    } else {
        echo "      \$" . $c. " = \$f3->get('POST.". $c."');\n";
    }
}
echo '' . "\n";

echo '      $'.strtolower($send_nome_classe)." = new \app\Model\\".ucwords($send_nome_classe)."(";
foreach ($campi as $c) {
    if($c == $campi[0]) {
        echo "\$" . $c.", ";
    } else {
        if($c == end($campi)) {
            echo "\$" . $c."";
        } else {
            echo "\$" . $c.", ";
        }
        
    }
}
echo ');'."\n";
echo '      $'.strtolower($send_nome_classe)."->Update();"."\n";

echo '' . "\n";

echo "      \app\Helper\Flash::instance()->addMessage('" . ucwords($send_nome_classe) . " modificato', 'success');" . "\n";
echo "      \$f3->reroute('@" . strtolower($send_nome_classe) . "_lista');\n";

// CHIUDI MODIFICADB
echo '   }' . "\n\n";






// LISTA
echo '   public function Lista($f3) {' . "\n";

echo '      $lista = \app\Model\\'. ucwords($send_nome_classe) ."::SelectAll();" . "\n";    
echo "      \$f3->set('lista', \$lista);" . "\n";

echo '' . "\n";

echo "      \$f3->set('titolo', '" . ucwords($send_nome_classe) . "');" . "\n";
echo "      \$f3->set('contenuto', '" . ucwords($send_nome_classe) . "/" . ucwords($send_nome_classe) . "_lista.htm');" . "\n";
echo "      \$f3->set('script', '" . ucwords($send_nome_classe) . "_lista.js');" . "\n";
echo "      echo \Template::instance()->render('../app/View/Generic/Base.htm');" . "\n";

// CHIUDI LISTA
echo '   }' . "\n\n";





// VEDI
echo '   public function Vedui($f3, $params) {' . "\n";

echo "      \$id" . strtolower($send_nome_classe) . " = \$params['id'];" . "\n";
echo '      $elemento = \app\Model\\'. ucwords($send_nome_classe) ."::SelectById(\$id". strtolower($send_nome_classe).");" . "\n";    
echo "      \$f3->set('elemento', \$elemento);" . "\n";

echo '' . "\n";

echo "      \$f3->set('titolo', '" . ucwords($send_nome_classe) . "');" . "\n";
echo "      \$f3->set('contenuto', '" . ucwords($send_nome_classe) . "/" . ucwords($send_nome_classe) . "_vedi.htm');" . "\n";
echo "      echo \Template::instance()->render('../app/View/Generic/Base.htm');" . "\n";

// CHIUDI VEDI
echo '   }' . "\n\n";


/*

*/




// CANCELLA
echo '   public function Cancella($f3, $params) {' . "\n";

echo "      \$id" . strtolower($send_nome_classe) . " = \$params['id'];" . "\n";
echo '      $elemento = \app\Model\\'. ucwords($send_nome_classe) ."::SelectById(\$id". strtolower($send_nome_classe).");" . "\n";    
echo "      \$f3->set('elemento', \$elemento);" . "\n";

echo '' . "\n";

echo "      \$f3->set('titolo', '" . ucwords($send_nome_classe) . "');" . "\n";
echo "      \$f3->set('contenuto', '" . ucwords($send_nome_classe) . "/" . ucwords($send_nome_classe) . "_cancella.htm');" . "\n";
echo "      echo \Template::instance()->render('../app/View/Generic/Base.htm');" . "\n";

// CHIUDI CANCELLA
echo '   }' . "\n\n";






// CANCELLADB
echo '   public function CancellaDb($f3, $params) {' . "\n";

echo "      \$id" . strtolower($send_nome_classe) . " = \$params['id'];" . "\n";
echo '      \app\Model\\'. ucwords($send_nome_classe) ."::DeleteById(\$id". strtolower($send_nome_classe).");" . "\n";

echo '' . "\n";

echo "      \app\Helper\Flash::instance()->addMessage('" . ucwords($send_nome_classe) . " cancellato', 'success');" . "\n";
echo "      \$f3->reroute('@" . strtolower($send_nome_classe) . "_lista');\n";

// CHIUDI CANCELLADB
echo '   }' . "\n";


// CHIUSURA CLASSE
echo "}\n";
