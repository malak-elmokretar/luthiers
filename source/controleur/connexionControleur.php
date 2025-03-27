<?php

function connexionControleur($twig, $db){ 
    $form = array(); 
  
    if (isset($_POST['btnConnexion'])){ 
        $form['valide'] = true; 
        $inputnomUtilisateur = $_POST['inputnomUtilisateur']; 
        $inputPassword = $_POST['inputPassword']; 
        $utilisateur = new Utilisateur($db); 
        $unUtilisateur = $utilisateur->connect($inputnomUtilisateur);
        if ($unUtilisateur!=null){
            if(!password_verify($inputPassword,$unUtilisateur['mdp'])){
                $form['valide'] = false;
                $form['message'] = 'Login ou mot de passe incorrect';
            } else {
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