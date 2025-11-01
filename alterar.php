<body>
	<form name="dados" action="" method="post">
		<h1>Alterar Alunos na Tabela</h1><hr>
		Digite o ID do aluno<br>
		<input type="text" name="txtid" value="<?php echo htmlentities($_POST['txtid']); ?>">
		<input type="submit" name="btnpesquisar" value="Pesquisar">
		<input type="submit" name="btnlistar" value="Listagem">
	</form>
</body>

<?php
	include 'conectar.php';
	if(isset($_POST['btnpesquisar']))
	{
		$id = $_POST['txtid'];
		$sql = "select * from tbalunos where id='$id'";
		$result = mysqli_query($conexao,$sql);
		while($reg=mysqli_fetch_array($result))
		{
			echo "<form method='post'><h3>";
			echo "Código: ";
			echo "<input type='text' name='txtid' value='$reg[id]' maxlength=5 readonly><br>";
			echo "Nome: ";
			echo "<input type='text' name='txtnome' value='$reg[nome]' maxlength=40><br>";
			echo "Classe: ";
			echo "<input type='text' name='txtclasse' value='$reg[classe]' maxlength=40><br>";
			echo "E-mail: ";
			echo "<input type='text' name='txtemail' value='$reg[email])' maxlength=40><br>";
			echo "<br><input type='submit' name='btnalterar' value='Alterar'>";
			echo "</form>";
		}
	} 
?>
<?php
	if(isset($_POST['btnalterar']))
	{
		$id = $_POST['txtid'];
		$nome=$_POST['txtnome'];
		$classe = $_POST['txtclasse'];
		$email=$_POST['txtemail'];
		$sql = "update tbalunos set nome='$nome', classe='$classe', email='$email' where id='$id'";
		$result = mysqli_query($conexao,$sql);
		echo "<font size=4 color='green' face='verdana'>Dados alterados com sucesso</font><br><br>";
	}
	if(isset($_POST['btnlistar']))
	{
		header("Location: listar2.php");
	}
?>
