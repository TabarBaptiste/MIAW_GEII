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

        $mdp = password_hash($mdp, PASSWORD_BCRYPT);

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

    public function connection_user($mail, $mdp){
        $query = "SELECT id_utilisateur, roles.nom AS role, mot_de_passe, utilisateurs.nom, prenom FROM `utilisateurs` INNER JOIN roles ON utilisateurs.role = roles.id_role WHERE id_utilisateur='$mail'; ";
        $result = $this->db->query($query);

        if($result->num_rows == 1){
            while($row = $result->fetch_assoc()){
                $umail = $row['id_utilisateur'];
                $urole = $row['role'];
                $umdp = $row['mot_de_passe'];
                $unom = $row['nom'];
                $uprenom = $row['prenom'];
            }

            if($umail == $mail && password_verify($mdp, $umdp)){
                session_start();

                $_SESSION['mail'] = $umail;
                $_SESSION['role'] = $urole;
                $_SESSION['nom'] = $unom;
                $_SESSION['prenom'] = $uprenom;
            }else{
                return false;
            }

            return true;

        }else{
            return false;
        }

    }
}