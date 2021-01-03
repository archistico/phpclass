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
echo "namespace $send_name_space;\n";
echo "\n";

// CLASSE
echo "class " . ucwords($send_nome_classe) . " \n{" . "\n";

// CAMPI
foreach ($campi as $c) {
    echo "   public $" . $c . ";" . "\n";
}

// COSTRUTTORE
echo "\n";
echo "   public function __construct(";
foreach ($campi as $c) {
    if ($c == end($campi)) {
        echo "$" . $c;
    } else {
        echo "$" . $c . ", ";
    }
}
echo ")\n   {\n";
foreach ($campi as $c) {
    echo '      $this->'.$c." = $".$c.";\n";
    
}

echo "   }\n";

// INSERT
echo "\n";
echo "   public function Insert()\n";
echo "   {\n";

echo "      try {\n";
echo '         $db = (\app\Model\Db::getInstance())->connect();'."\n";
echo '         $sql = '."\"INSERT INTO ".strtolower($send_nome_classe)." (";
foreach ($campi as $c) {
    if ($c == end($campi)) {
        echo $c;
    } else {
        echo $c . ", ";
    }
}
echo ")"."\n";
echo "         VALUES (";
foreach ($campi as $c) {
    if ($c == end($campi)) {
        echo ":".$c;
    } else {
        echo ":".$c . ", ";
    }
}
echo ")\";"."\n\n";
echo '         $db->begin();'."\n";

echo '         $db->exec($sql, ['."\n";
foreach ($campi as $c) {
    if ($c == end($campi)) {
        echo "            ':".$c . "' => \$this->".$c."\n";
    } else {
        echo "            ':".$c . "' => \$this->".$c.", \n";
    }
}
echo '         ]);'."\n";

echo '         $db->commit();'."\n";

echo '      } catch (\Exception $e) {'."\n";
echo '          echo '."'Caught exception: ', ".'$e->getMessage()'.", \"\\n\";"."\n";
echo '          return false;'."\n";
echo "      }\n";
echo "      return true;\n";

// CHIUSURA INSERT
echo "   }\n";


// UPDATE
echo "\n";
echo "   public function Update()\n";
echo "   {\n";

echo "      try {\n";
echo '         $db = (\app\Model\Db::getInstance())->connect();'."\n";
echo '         $sql = '."\"UPDATE ".strtolower($send_nome_classe)." SET \n";
foreach ($campi as $c) {
    if ($c == end($campi)) {
        echo "            ".$c ." = :".$c."\n";
    } else {
        echo "            ".$c ." = :".$c . ", \n";
    }
}
echo "         \";"."\n\n";
echo '         $db->begin();'."\n";

echo '         $db->exec($sql, ['."\n";
foreach ($campi as $c) {
    if ($c == end($campi)) {
        echo "            ':".$c . "' => \$this->".$c."\n";
    } else {
        echo "            ':".$c . "' => \$this->".$c.", \n";
    }
}
echo '         ]);'."\n";

echo '         $db->commit();'."\n";

echo '      } catch (\Exception $e) {'."\n";
echo '          echo '."'Caught exception: ', ".'$e->getMessage()'.", \"\\n\";"."\n";
echo '          return false;'."\n";
echo "      }\n";
echo "      return true;\n";

// CHIUSURA UPDATE
echo "   }\n";


// INFO STATIC METHOD
echo "\n";
echo '   // --------------------------'."\n";
echo '   // --------- STATIC ---------'."\n";
echo '   // --------------------------'."\n";


// SELECT BY ID
echo "\n";
echo "   public static function SelectById(\$id".strtolower($send_nome_classe).")\n";
echo "   {\n";

echo '      $db = (\app\Model\Db::getInstance())->connect();'."\n";
echo "      \$sql = \"SELECT * FROM ".strtolower($send_nome_classe)." WHERE id".strtolower($send_nome_classe)." = :id".strtolower($send_nome_classe)."\";\n";
echo '      $lista = $db->exec($sql, ['."\n";
echo "         ':id".strtolower($send_nome_classe)."' => \$id".strtolower($send_nome_classe)."\n";
echo '      ]);'."\n";
echo '      return $lista[0];'."\n";

// CHIUSURA SELECT BY ID
echo "   }\n";

// SELECT ALL
echo "\n";
echo "   public static function SelectAll()\n";
echo "   {\n";

echo '      $db = (\app\Model\Db::getInstance())->connect();'."\n";
echo "      \$sql = \"SELECT * FROM ".strtolower($send_nome_classe)."\";\n";
echo '      $lista = $db->exec($sql, []);'."\n";
echo '      return $lista;'."\n";

// CHIUSURA SELECT ALL
echo "   }\n";

// DELETE
echo "\n";
echo "   public static function DeleteById(\$id".strtolower($send_nome_classe).")\n";
echo "   {\n";

echo '      $db = (\app\Model\Db::getInstance())->connect();'."\n";
echo "      \$sql = \"DELETE FROM ".strtolower($send_nome_classe)." WHERE id".strtolower($send_nome_classe)." = :id".strtolower($send_nome_classe)."\";\n";
echo '      $db->exec($sql, ['."\n";
echo "         ':id".strtolower($send_nome_classe)."' => \$id".strtolower($send_nome_classe)."\n";
echo '      ]);'."\n";
echo '      return true;'."\n";

// CHIUSURA DELETE
echo "   }\n";


// CHIUSURA CLASSE
echo "}\n";
