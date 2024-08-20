<?
namespace Interfaces\Services;

use Dtos\UserDto;

interface UserInterface
{
    public function login(UserDto $userDto);
    public function cadastro(UserDto $userDto);
}

?>