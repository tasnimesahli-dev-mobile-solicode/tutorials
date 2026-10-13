<?php
require_once __DIR__ . '/classes/User.php';
require_once __DIR__ . '/classes/Auteur.php';

$users = [
    new User(),
    new Auteur()
];

foreach ($users as $user) {
    echo $user->getRoleName() . "<br>";
}
