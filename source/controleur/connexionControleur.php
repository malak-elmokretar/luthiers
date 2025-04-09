<?php

function connexionControleur($twig, $db){ 
    $form = array(); 
  
    if (isset($_POST['btnConnexion'])){ 
        $form['valide'] = true; 
        $nomUtilisateur = $_POST['inputnomUtilisateur']; 
        $password = $_POST['inputPassword']; 
        $utilisateur = new Utilisateur($db); 
        $unUtilisateur = $utilisateur->connect($nomUtilisateur);
        if ($unUtilisateur!=null){
            if(!password_verify($password,$unUtilisateur['pword'])){
                $form['valide'] = false;
                $form['message'] = 'Login ou mot de passe incorrect';
            } else {
                $_SESSION["nomUtilisateur"] = $nomUtilisateur;
                $_SESSION["pword"] = $password;
                header("Location:index.php"); 
            }
        } else {
            $form['valide'] = false; 
            $form['message'] = 'Login ou mot de passe incorrect'; 
        } 
    }
    echo $twig->render('connexion.twig', array('form'=>$form)); 
}
?>