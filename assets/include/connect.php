<div id="pen-title">
  <h1>Connexion </h1>
</div>
<div id="pen-title2">
  <h1>Inscription </h1>
</div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Connexion</h1>
    <form method="post" action="assets/include/traitement-connexion.php">
      <div class="input-container">
        <input type="#{type}" name="mail" required="required" />
        <label for="#{label}">Adresse mail</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="mdp" required="required" />
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <?php 
         if(!isset($_GET['id'])){
          echo "<p style='display:none'>rien</p>";
      }else{
    switch ($_GET['id']){
        case "ermailmdp":
            echo "<p class='messageerreur'> Connexion impossible :<br> Email ou Mot de passe oublié</p>";
            break;
            case "erexistpas":
              echo "<p style='color: white; justify-content: center'> Vous etes pas inscrit ou vous n'etes pas valider </p>";
              break;
              case "ncompris":
                  echo "<p style='color: white'> Erreur est le contenu </p>";
                  break;
              
        }}?>
      <div class="input-container">
        <input type="checkbox" id="checkbox" />
        <label for="checkbox"><span class="ui"></span>Rester connecter</label>

      </div>
      <div class="button-container">
        <button><span>Connexion</span></button>
      </div>
      <div class="footer"><a href="#">Vous avez oublié votre mot de passe ?</a></div>
    </form>
  </div>

  <div class="card alt">

    <div class="toggle"></div>
    <h1 class="title">Enregister
      <div class="close"></div>
    </h1>
    <form method="post" action="assets/include/traitement-inscription.php">
      <div class="input-container">
        <input type="#{type}" id="#{label}" name="Pseudo" required="required" />
        <label for="#{label}">Pseudo</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="#{type}" id="mail1" onchange="DoubleCheck()" name="Mail1" required="required" />
        <label for="#{label}">Adresse mail</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="#{type}" id="mail2" onchange="DoubleCheck()" name="Mail2" required="required" />
        <label for="#{label}"> Confirmer Adresse mail</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="mdp1" onchange="DoubleCheck()" name="Mdp1" required="required" />
        <label for="#{label}">Mot de passe</label>
        <div class="bar"></div>

      </div>
      <div class="input-container"
        style=" align-items: center; display: flex; justify-content: center; color: red; margin: 0px 0 50px;">(minimum :
        8 caractères, 1 majuscule, 1 minuscule, 1 chiffre)</div>

      <div class="input-container">
        <input type="password" id="mdp2" onchange="DoubleCheck()" name="Mdp2" required="required" />
        <label for="#{label}"> Confirmer Mot de passe</label>
        <div class="bar"></div>
      </div>
      <?php 
         if(!isset($_GET['id'])){
          echo "<p style='display:none'>rien</p>";
      }else{
    switch ($_GET['id']){
        case "erreurexist":
            echo "<p class='messageerreur'> Inscription impossible :<br> adresse mail existant</p>";
            break;
        case "succesinscrit":
            echo "<p style='color: white; justify-content: center'> Vous etes bien inscrit</p>";
            break;
        case "erreurm":
          echo "pas de contenu dans les champs demander";
          break;
        
        }}?>
      <div class="button-container">
        <button type="Submit" id="submit"><span>Valider</span></button>
      </div>
    </form>
  </div>
</div>

<!-- Portfolio--><a id="portfolio" href="localhost/portfolio/" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="#" title="Follow me!"><i class="fa fa-codepen"></i></a>