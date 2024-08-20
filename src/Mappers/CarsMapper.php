<?
namespace Mappers;

use Dtos\CarsDto;

class CarsMapper {

    public static function assocObjDadosToCars(object $dados): CarsDto
    {
        return new CarsDto(
            id: $dados->idcars ?? null,
            modelo: $dados->modelo,
            fabricante: $dados->fabricante,
            veiculo: $dados->veiculo,
            ano: $dados->ano
        );
    }
}


?>