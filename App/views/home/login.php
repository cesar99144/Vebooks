 <?php 
  //Exibe mensagens de validação para o usuário
  if(!empty($data['mensagem'])):

  	foreach($data['mensagem'] as $m):
  		echo $m."<br>";
  	endforeach;

  endif;

?>


 <section id="form">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--Formulário login-->
						<h2>faça login em sua conta</h2>
						<form form action="/home/login" method="POST">
							<input id="email" type="email" placeholder="Email" name="email" required>
							<input id="password" type="password" placeholder="Senha" name="senha" required>
							<button type="submit" name="entrar" class="btn btn-default">Login</button>
						</form>
					</div><!--/Formulário login-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OU</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--Formulário cadastro-->

						<h2>Cadastrar-se</h2>
						<form action="/usuarios/cadastrarUsuario" method="POST">
							<input type="text" name="nome" placeholder="Nome"/>
							<input type="email" name="email" placeholder="Email"/>
							<select name="tipo">
								<option value="2">Cliente</option>
								<option value="3">Editora</option>
								<option value="3">Escritor</option>
							</select><br>
							<br><input type="password" name="senha" placeholder="Password"/>
							<button name="cadastrar">Cadastrar</button>
						</form>
					</div><!--/Formulário cadastro-->
				</div>
			</div>
		</div>
	</section>


 <br><br><div class="row container teal">
 <center>
 <?php 
  
  if(!empty($data['mensagem'])):

  	foreach($data['mensagem'] as $m):
  		echo $m."<br>";
  	endforeach;

  endif;

?>
</center>
</div>