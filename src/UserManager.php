<?php
class UserManager
{
    private array $users = [];

    public function __construct(array $initialUsers = [])
    {
        $this->users = $initialUsers;
    }

    private function findByEmail(string $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }

    public function register(string $name, string $email, string $password): string
    {
        if (!Validator::isValidEmail($email)) {
            return "E-mail inválido";
        }

        if (!Validator::isValidPassword($password)) {
            return "Senha fraca: mínimo 8 caracteres, 1 maiúscula e 1 número.";
        }

        if ($this->findByEmail($email)) {
            return "E-mail já está em uso";
        }

        $id = count($this->users) + 1;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->users[] = new User($id, $name, $email, $hash);

        return "Usuário cadastrado com sucesso";
    }

    public function login(string $email, string $password): string
    {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user->getPasswordHash())) {
            return "Login bem-sucedido";
        }
        return "Credenciais inválidas";
    }

    public function resetPassword(int $id, string $newPassword): string
    {
        if (!Validator::isValidPassword($newPassword)) {
            return "Senha fraca: mínimo 8 caracteres, 1 maiúscula e 1 número.";
        }

        foreach ($this->users as $user) {
            if ($user->getId() === $id) {
                $user->setPasswordHash(password_hash($newPassword, PASSWORD_DEFAULT));
                return "Senha alterada com sucesso";
            }
        }

        return "Usuário não encontrado";
    }

    public function getUsers(): array
    {
        return $this->users;
    }
}
