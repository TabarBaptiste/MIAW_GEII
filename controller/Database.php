<?php

class Database{
    private $db;

    public function connect_db($host, $user, $passwd, $db){
        $this->db = mysqli_connect($host, $user, $passwd, $db);
        if($this->db->connect_error){
            echo "[ERREUR] Problème d'initialisation de connexion à la base de données.";
        }
    }

    public function create_user($mail, $id_role,$mdp, $nom, $prenom, $siret, $adresse){
        if($prenom != null){
            $prenom = "'$prenom'";
        }else{
            $prenom = 'NULL';
        }

        $numero_voie = $adresse['numero_voie'];
        $indice_voie = $adresse['indice_voie'];
        $type_voie = $adresse['type_voie'];
        $libelle_voie = $adresse['libelle_voie'];
        $ville = $adresse['ville'];
        $departement = $adresse['departement'];

        if($numero_voie != null){$numero_voie = "'$numero_voie'";}else{$numero_voie = 'NULL';}
        if($indice_voie != null){$indice_voie = "'$indice_voie'";}else{$indice_voie = 'NULL';}
        if($type_voie != null){$type_voie = "'$type_voie'";}else{$type_voie = 'NULL';}

        $query = "INSERT INTO `utilisateurs` (
                            id_utilisateur,
                            role, 
                            mot_de_passe, 
                            nom, 
                            prenom, 
                            siret, 
                            numero_voie, 
                            indice_voie, 
                            type_voie, 
                            libelle_voie, 
                            ville, 
                            departement
                        ) 
                    VALUES (
                            '$mail',
                            $id_role,
                            '$mdp', 
                            '$nom', 
                            $prenom, 
                            '$siret', 
                            $numero_voie, 
                            $indice_voie, 
                            $type_voie, 
                            '$libelle_voie', 
                            '$ville', 
                            '$departement'
                            );";
        if($this->db->query($query) === TRUE){
            if($id_role == 4){
                setcookie('alert_inscription_valid', "Votre compte a bien été créé.", time()+60, '/');
                header('Refresh: 0; URL=../?page=inscription');
            }
        }else{
            echo "Error: " . $query . "<br>" . $this->db->error;
        }
    }
}