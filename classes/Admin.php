
<?php

include("../classes/Conexao.php");
include("../classes/Utilidades.php");

class Admin{
    private $id;
    private $email;
    private $password;

    public function  __construct($id, $email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    public static function LoginRequest($email, $password){
        $objConexao = new Conexao();
        $conexaoDB = $objConexao->getConexao();

        $utilidades = new Utilidades();

        $sql = "select * from admin where email='$email' and password='$password'";
        $retorno =  $conexaoDB->query($sql);
        
        if (($row = $retorno->fetch_assoc())){
            $utilidades->alerta(true);
            return new Admin($row["id"], $email, $password);
        }
        $utilidades->alerta(false);
        return null;
    }
} 
?>