<?
namespace Interfaces\Repository;


interface UserInterface
{
    public function login(string $email, string $password);
    public function cadastro(string $nome, string $email, string $password);
}

?>