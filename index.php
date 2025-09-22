<?php
require_once 'src/User.php';
require_once 'src/Validator.php';
require_once 'src/UserManager.php';

$initialUsers = require 'initialUsers.php';
$userManager = new UserManager($initialUsers);

echo $userManager->register('Maria Oliveira', 'maria@email.com', 'Senha123') . PHP_EOL;
echo $userManager->register('Pedro', 'pedro@@email', 'Senha123') . PHP_EOL;
echo $userManager->login('joao@email.com', 'Errada123') . PHP_EOL;
echo $userManager->resetPassword(1, 'NovaSenha1') . PHP_EOL;
echo $userManager->register('Outro João', 'joao@email.com', 'Senha123') . PHP_EOL;
