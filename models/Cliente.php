<?php
class Cliente
{
    public $nome;
    public $email;
    public $tipo;
    public $numero_registro;
    public $telefone;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->nome = $attributes['nome'];
            $this->email = $attributes['email'];
            $this->tipo = $attributes['tipo'];
            $this->numero_registro = $attributes['numero_registro'];
            $this->telefone = $attributes['telefone'];
        }
    }

    public function insert($pdo){
        $sth = $pdo->prepare("INSERT INTO tb_clientes(nome,email,tipo,numero_registro,telefone) VALUES (:nome,:email,:tipo,:numero_registro,:telefone)");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':email',$this->email,PDO::PARAM_STR);
        $sth->BindValue(':tipo',$this->tipo,PDO::PARAM_INT);
        $sth->BindValue(':numero_registro',$this->numero_registro,PDO::PARAM_STR);
        $sth->BindValue(':telefone',$this->telefone,PDO::PARAM_STR);
        return $sth->execute();
    }

    public function update($id, $pdo){
        $sth = $pdo->prepare("UPDATE tb_clientes SET nome=:nome,email=:email,tipo=:tipo,numero_registro=:numero_registro, telefone=:telefone WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':email',$this->email,PDO::PARAM_STR);
        $sth->BindValue(':tipo',$this->tipo,PDO::PARAM_INT);
        $sth->BindValue(':numero_registro',$this->numero_registro,PDO::PARAM_STR);
        $sth->BindValue(':telefone',$this->telefone,PDO::PARAM_STR);
        return $sth->execute();
    }

    public static function select($id, $pdo){
        $sth = $pdo->prepare("SELECT * FROM tb_clientes WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }

    public static function selectAll($pdo){
        $sth = $pdo->query("SELECT * FROM tb_clientes ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public static function delete($id,$pdo){
        $sth = $pdo->prepare("DELETE FROM tb_clientes WHERE id=:id LIMIT 1");
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function quantidade($pdo){
        $sth = $pdo->query("SELECT * FROM tb_clientes ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return count($results);
    }
}

?>
