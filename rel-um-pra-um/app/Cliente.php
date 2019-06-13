<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Buscar o endereço dentro da tabela endereço
    // Vai procurar o único registro de endereço que pertence a este cliente
    // Caso você não queria seguir o padrão de nomenclatura do Lavavel vc tem que especificar melhor o relacionamento:
    // $this->hasOne('Nome da Classe','nome do Campo da tabela de Endereço', nome do campo da tabela de Cliente);
    public function endereco(){
        return $this->hasOne('App\Endereco','cliente_id', 'id');
    }
}
