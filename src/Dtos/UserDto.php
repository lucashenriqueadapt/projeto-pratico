<?
namespace Dtos;

class UserDto
{
   public function __construct(
       public int $id,
       public string $nome,
       public string $email,
       public string $password,
   )
   {}
}
?>