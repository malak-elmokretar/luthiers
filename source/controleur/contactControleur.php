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
        $exec = $contactMessage -> insert(htmlspecialchars($email), htmlspecialchars($nom), htmlspecialchars($prenom), htmlspecialchars($email), $telephone, htmlspecialchars($message));
        if (!$exec){
            $form["valide"] = false;
            $form["erreur"] = "Problème d'insertion, veuillez réessayer plus tard.";
        }
    }
    echo $twig->render("contact.twig", array("form"=>$form));
}

?>