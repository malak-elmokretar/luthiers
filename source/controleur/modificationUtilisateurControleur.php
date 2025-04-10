<?php

function modificationUtilisateurControleur($twig, $db){
  $form = array();
  if(isset($_GET['id'])){ 
    $utilisateur = new Utilisateur($db);
    $unUtilisateur = $utilisateur->selectById($_GET['id']);
    if ($unUtilisateur!=null){
      $form['utilisateur'] = $unUtilisateur;
    } else {
      $form['message'] = 'Utilisateur incorrect';
    }
  }
  if(isset($_POST['btnModification'])){
    $utilisateur = new Utilisateur($db);
    $nom = $_POST['inputNomModification']; 
    $prenom = $_POST['inputPrenomModification'];
    $nom_utilisateur = $_POST['inputNomUtilisateurModification'];
    $id = $_POST['id'];
    $exec=$utilisateur->update($id, htmlspecialchars($nom_utilisateur), htmlspecialchars($nom), htmlspecialchars($prenom));
    if(!$exec){
      $form['valide'] = false;
      $form['message'] = '&Eacute;chec de la modification';
    } else {
      $form["valide"] = true;
      $form["message"] = "Modification r&eacute;ussie";
    }
  } else {
    $form['message'] = 'Utilisateur non pr&eacute;cis&eacute;';
  }
  echo $twig->render("modificationUtilisateur.twig", array("form"=>$form));
}

?>