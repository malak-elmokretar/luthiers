<?php
function inscriptionControleur($twig, $db){
    $formInscription = array();
    if (isset($_POST['btnInscription'])){
        $inputEmail = $_POST['inputEmailInscription'];
        $inputNomUtilisateur = $_POST['inputNomUtilisateurInscription'];
        $inputPassword = $_POST['inputPasswordInscription'];
        $inputPassword2 =$_POST['inputPassword2Inscription'];
        $nom = $_POST['inputNomInscription'];
        $prenom = $_POST['inputPrenomInscription'];
        $formInscription['valide']= true;
        if ($inputPassword!=$inputPassword2){
            $formInscription['valide'] = false; 
            $formInscription['message'] = 'Les mots de passe sont diff&eacute;rents';
        } else {
            $utilisateur = new Utilisateur($db);
            $exec = $utilisateur->insert($inputEmail, $inputNomUtilisateur, password_hash($inputPassword, PASSWORD_DEFAULT), $nom, $prenom);
            if (!$exec){
                $formInscription['valide'] = false;
                $formInscription['message'] = "Probl&egrave;me d'insertion dans la table utilisateur";
            }
        }
        $formInscription['emailInscription']= $inputEmail;
    }
    echo $twig->render('inscription.twig', array('formInscription'=>$formInscription));
}

?>