<?php

$raison_sociale =   remove_accents(strtoupper($_POST['raison_sociale']));
$siret =            $_POST['siret'];
# -- Adresse --
$adresse['numero_voie'] =      strtoupper(remove_accents($_POST['numero_voie']));
if(strlen($adresse['numero_voie']) == 0){$adresse['indice_voie'] = null;}

$adresse['indice_voie'] =      strtoupper(remove_accents($_POST['indice_voie']));
if(strlen($adresse['indice_voie']) == 0){$adresse['indice_voie'] = null;}

$adresse['type_voie'] =        strtoupper(remove_accents($_POST['type_voie']));
if(strlen($adresse['type_voie']) == 0){$adresse['indice_voie'] = null;}

$adresse['libelle_voie'] =     strtoupper(remove_accents($_POST['libelle_voie']));
$adresse['ville'] =            strtoupper(remove_accents($_POST['ville']));
$adresse['departement'] =      $_POST['departement'];
# -- Fin Adresse --
$mail =             $_POST['mail'];
$re_mail =          $_POST['re_mail'];
$mdp =              $_POST['mdp'];
$re_mdp =           $_POST['re_mdp'];

$refresh_time = 0;

if($mail != $re_mail){
    setcookie('alert_inscription', "Les adresses mails ne correspondent pas.", time()+60, '/');
    header('Refresh: '.$refresh_time.'; URL=../?page=inscription');
}

if($mdp != $re_mdp){
    setcookie('alert_inscription', "Les mots de passe ne correspondent pas.", time()+60, '/');
    header('Refresh: '.$refresh_time.'; URL=../?page=inscription');
}

$entreprise = get_enterprise_infos($siret);


$keys = array('numero_voie','indice_voie','type_voie','libelle_voie','ville','departement');
$values = array('Le numéro', 'L\'indice', 'Le type', 'Le libellé', 'La ville', 'Le département');

for($i = 0 ; $i < count($keys) ; $i++) {
    if($adresse[$keys[$i]] != $entreprise[$keys[$i]]){
        setcookie('alert_inscription', $values[$i]." de la voie ne correspond pas à celui/celle du siret.", time()+60, '/');
        header('Refresh: '.$refresh_time.'; URL=../?page=inscription');
    }
}
/*
echo $mail."<br>";
echo $mdp."<br>";
echo $siret."<br>";
echo $raison_sociale."<br><br>";
echo "Numéro voie  : ".$adresse['numero_voie']."<br>";
echo "Indice voie  : ".$adresse['indice_voie']."<br>";
echo "Type voie    : ".$adresse['type_voie']."<br>";
echo "Libellé voie : ".$adresse['libelle_voie']."<br>";
echo "Ville        : ".$adresse['ville']."<br>";
echo "Département  : ".$adresse['departement']."<br>";
echo "<hr>";
*/

# Insertion de l'entreprise dans la base de données.
include_once './Database.php';

$host = "localhost";
$user = "site_departement";
$passwd = "departement";
$base = "site_departement";


$db = new Database();
$db->connect_db($host, $user, $passwd, $base);
# Création de l'entreprise (id = 4 & pas de 'prenom' donc null)
$db->create_user($mail,4, $mdp, $raison_sociale,null, $siret, $adresse);


function get_enterprise_infos($numero_siret){
    $ch = curl_init();
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
        'Accept: application/json',
        'Authorization: Bearer 4f700d8b-9e04-350c-89b4-0708c0189fec'
    );
    $url = "https://api.insee.fr/entreprises/sirene/V3.11/siret/".$numero_siret;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    $resultJson = json_decode($result, true);

    if($resultJson['header']['statut'] == 404){
        setcookie('alert_inscription', "Le numéro de siret est incorrecte.", time()+60, '/');
        header('Refresh: '.'1'.'; URL=../?page=inscription');
        return null;
    }

    if($resultJson['header']['statut'] == 200){
        $entreprise['raison_sociale'] = $resultJson['etablissement']['uniteLegale']['denominationUniteLegale'];
        $entreprise['numero_voie'] =    $resultJson['etablissement']['adresseEtablissement']['numeroVoieEtablissement'];
        $entreprise['indice_voie'] =    $resultJson['etablissement']['adresseEtablissement']['indiceRepetitionEtablissement'];
        $entreprise['type_voie'] =      $resultJson['etablissement']['adresseEtablissement']['typeVoieEtablissement'];
        $entreprise['libelle_voie'] =   $resultJson['etablissement']['adresseEtablissement']['libelleVoieEtablissement'];
        $entreprise['ville'] =          $resultJson['etablissement']['adresseEtablissement']['libelleCommuneEtablissement'];
        $entreprise['departement'] =    $resultJson['etablissement']['adresseEtablissement']['codePostalEtablissement'];

        return $entreprise;
    }
}

function remove_accents($str)
{
    $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
    $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

    $str = str_replace($search, $replace, $str);
    $str = str_replace('-', ' ', $str);
    return $str;
}