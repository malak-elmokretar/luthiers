<?php

function contactControleur($twig){
    $form = array();
    if (isset($_POST["btnContacter"])){
        $selectObjet = $_POST["selectObjet"];
        $inputNom = $_POST["inputNom"];
        $inputPrenom = $_POST["inputPrenom"];
        $inputEmail = $_POST["inputEmail"];
        $inputTelephone = $_POST["inputTelephone"];
        $inputMessage =$_POST["inputMessage"];
        $form["valide"] = true;
        $form['email'] = $inputEmail;
        $form['objet'] = $selectObjet;
    }
    echo $twig->render("contact.twig", array("form"=>$form));
}

?>