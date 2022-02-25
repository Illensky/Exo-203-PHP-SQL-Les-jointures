<?php

require __DIR__ . '/Classes/DBSingleton.php';

$pdo = DBSingleton::PDO();

$stm = $pdo->prepare("
    SELECT eleve.*, eleve_information.*
    FROM eleve
    INNER JOIN eleve_information ON eleve.information_fk = eleve_information.id
");

if ($stm->execute()) {
    echo "<pre>";
    print_r($stm->fetchAll());
    echo "</pre>";
}

$stm = $pdo->prepare("
    SELECT eleve_competence.niveau, competence.titre, eleve.prenom, eleve.nom
    FROM eleve_competence
    INNER JOIN competence ON eleve_competence.competence_fk = competence.id
    INNER JOIN eleve ON eleve_competence.eleve_fk = eleve.id
");

if ($stm->execute()) {
    echo "<pre>";
    print_r($stm->fetchAll());
    echo "</pre>";
}