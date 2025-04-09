<?php

function modificationUtilisateurControleur($twig, $db){
    $form = array(); if(isset($_GET['id'])){ 
        $utilisateur = new Utilisateur($db);
        $unUtilisateur = $utilisateur->selectById($_GET['id']);
        if ($unUtilisateur!=null){
          $form['utilisateur'] = $unUtilisateur;
        } else {
          $form['message'] = 'Utilisateur incorrect';
        }
      } else {
        $form['message'] = 'Utilisateur non précisé';
      }
    echo $twig->render("modificationUtilisateur.twig", array("form"=>$form));
}

?>