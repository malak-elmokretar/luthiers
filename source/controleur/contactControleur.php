<?php

function contactControleur($twig, $db){
    $form = array();
    if (isset($_POST["btnContacter"])){
        $objet = $_POST["selectObjet"];
        $nom = $_POST["inputNom"];
        $prenom = $_POST["inputPrenom"];
        $email = $_POST["inputEmail"];
        $telephone = $_POST["inputTelephone"];
        $message =$_POST["inputMessage"];
        $form["valide"] = true;
        $form['email'] = $email;
        $form['objet'] = $objet;
        $contactMessage = new ContactMessage($db);
        // $listeMessages = $contactMessage -> select();
        $exec = $contactMessage -> insert($email, $nom, $prenom, $email, $telephone, $message);
        if (!$exec){
            $form["valide"] = false;
            $form["erreur"] = "Problème d'insertion, veuillez réessayer plus tard.";
        }
    } 
    // else {
    //     $listeMessages = $contactMessage -> select();
    // }
    echo $twig->render("contact.twig", array("form"=>$form));
}

?>