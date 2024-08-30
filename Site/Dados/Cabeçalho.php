<!-----------------------------------------------Cabeçalho------->

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="Site/CSS/Cabeçalho.css">
</head>

<div class='Cabeçalho'>



<!-----------------------Cabeçalho-------------------------------------------->

<header id="header">
<a id="logo" href="">Library Movie</a>

<form id="Pesquisa" action="Pesquisar.php" method="GET">
    <input type="text" name="q" placeholder="Pesquisar...">
    <input id="BotaoPesquisa" type="submit" value="Pesquisar">
</form>


<div id="AbrirBotao">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
<span id="BThamburger"></span>
</button>
<ul id="menu" role="menu">
<li><a  href="Inicio.php">Inicio</a></li>
<li><a href="Filme.php">Filmes</a></li>
<li><a href="Serie.php">Series</a></li>
<li><a href="Anime.php">Animes</a></li>   
<li><a href="Lista.php">Minhas Listas</a></li> 
<li><a href="Perfil.php">Perfil</a></li>
<li><a href="Sair.php?logout=1">Sair</a></li> 
</ul>
</div id="AbrirBotao">
</header>

<!-----------------------Hamburguer-------------------------------->


<script> const btnMobile = document.getElementById('btn-mobile');

function toggleMenu(event) {
  if (event.type === 'touchstart') event.preventDefault();
  const AbrirBotao = document.getElementById('AbrirBotao');
  AbrirBotao.classList.toggle('active');
  const active = AbrirBotao.classList.contains('active');
  event.currentTarget.setAttribute('aria-expanded', active);
  if (active) {
    event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
  } else {
    event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
  }
}

btnMobile.addEventListener('click', toggleMenu);
btnMobile.addEventListener('touchstart', toggleMenu);
</script>

</div class='Cabeçalho'>
</html>


<!-----------------------Hamburguer-------------------------------->

