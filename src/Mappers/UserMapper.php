<?
namespace Mappers;
use Dtos\UserDto;

class UserMapper
{
    public function __construct()
    {
    }

    public static function assocObjDadosToUser(object $dados): UserDto
    {
        return new UserDto(
            id: $dados->id ?? null,
            nome: $dados->nome,
            email: $dados->email ?? '',
            password: $dados->password
        );
    }
}
?>