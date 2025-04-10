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
        $contact = new Contact($db);
        $exec = $contact -> insert(htmlspecialchars($email), htmlspecialchars($nom), htmlspecialchars($prenom), htmlspecialchars($email), $telephone, htmlspecialchars($message));
        if (!$exec){
            $form["valide"] = false;
            $form["erreur"] = "Probl&egrave;ème d'insertion, veuillez r&eacute;essayer plus tard.";
        }
    }
    echo $twig->render("contact.twig", array("form"=>$form));
}

?>