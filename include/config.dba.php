<?php
    $servidor = "eu-cdbr-west-02.cleardb.net";
    $usuario = "bfb0bbb7cebc8a";
    $senha = "dc68df13";
    $dbname = "heroku_ec6f1ed120199b4";    
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }      
?> 