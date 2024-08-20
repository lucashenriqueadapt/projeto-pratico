<?
namespace Dtos;

class CarsDto
{
    public function __construct(
        public int $id,
        public string $modelo,
        public int $fabricante,
        public int $veiculo,
        public int $ano,
        public ?int $del = 0
    ){}

}