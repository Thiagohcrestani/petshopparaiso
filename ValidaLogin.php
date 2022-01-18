<?php
    session_start(); 
        //Incluindo a conexão com banco de dados   
    include_once("include/config.dba.php");    
    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['login'])) && (isset($_POST['senha']))){
        $login = mysqli_real_escape_string($conn, $_POST['login']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $senha = MD5($senha);
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $result_usuario = "SELECT * FROM cadastrousuario WHERE login_usuario = '$login' && senha_usuario = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        var_dump($resultado);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['id'] = $resultado['id_usuario'];
            $_SESSION['nome'] = $resultado['nome_usuario'];

			header("Location: index_menu.php");
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            ?>
		<script language="JavaScript">
				alert("Usuário/Senha Incorretos, favor verificar!!!");
				window.history.go(-1);
			</script>
		
		?>
		<?php
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
		?>
		<script language="JavaScript">
				alert("Usuário/Senha Incorretos, favor verificar!!!");
				window.history.go(-1);
			</script>
		
		?>
		<?php
    }
?>