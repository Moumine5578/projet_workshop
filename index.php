<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="image/chat%20BICE.png" type="image/x-icon">
    <title>
        Workshop
    </title>
    <link rel="stylesheet" type="text/css" href="blog.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // Démarrez la session
    session_start();

    // Vérifiez si la variable de session "niveau" existe
    if (!isset($_SESSION['niveau'])) {
        // Si le joueur n'a jamais joué, initialisez le niveau à 0
        $_SESSION['niveau'] = 0;
    }
    // Récupérez le niveau actuel depuis la session
    $niveauActuel = $_SESSION['niveau'];

    if (!isset($_SESSION['nbRepValide']) || $niveauActuel==0) {
        $_SESSION['nbRepValide'] = 0;
    }



    // Traitement du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['suivant'])) {
        // Augmentez le niveau actuel
        $_SESSION['niveau'] = $niveauActuel + 1;
        // Redirigez l'utilisateur vers la même page pour afficher le contenu mis à jour
        header("Location: index.php");
        exit;
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['skip'])){
        // Augmentez le niveau actuel
        $_SESSION['niveau'] = 6;

        // Redirigez l'utilisateur vers la même page pour afficher le contenu mis à jour
        header("Location: index.php");
        exit;
    }elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start'])){
        // Augmentez le niveau actuel
        $_SESSION['niveau'] = 0;

        // Redirigez l'utilisateur vers la même page pour afficher le contenu mis à jour
        header("Location: index.php");
        exit;
    }

    else if ($niveauActuel == 6){
        ?>
    <header>
        <div class="dropdown">
            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="position: fixed; margin-top: 20px; margin-left: 20px">
                <img src="images/menu.png" style="width: 50px">
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <form method="post">
                        <button type="submit" class="dropdown-item" name="start">Jouer</button>
                    </form>
                </li>
                <li><a class="dropdown-item" href="#Blog">Blog</a></li>
                <li><a class="dropdown-item" href="#Aides">Aides</a></li>
            </ul>
        </div>
    </header>
    <div style="width: 70%; min-height: 50%; background-color: darkslategrey; color: deepskyblue; display: flex; border-radius: 25px; margin: auto; margin-top: 1%; ">
        <?php if ($_SESSION['nbRepValide'] != 0){ ?>

        <div class="contenu-gauche">
            <div style="padding: 30px">
                <a style="font-size: 150%; padding: 15px">Résultat : <?php echo $_SESSION['nbRepValide']; ?>/5</a>
            </div>
            <form method="post" style="text-align: center; margin-top: 30%">
                <button type="submit" class="btn btn-primary start" name="start">Recommencer</button>
            </form>
        </div>
        <div style="width: 70%; overflow: hidden; text-align: center; padding: 15px">
            <a style="font-size: 150%;">Félicitations ! Vous avez appris les bases du développement en HTML et en PHP. Dans le reste du
                site, vous allez trouver des informations sur le monde du numérique et des aides qui vous permettront de vous lancer dans l'informatique.</a>
            <div>
                <img src="images/image-code.png" alt="image de code" style="display: flex; width: 40%;  margin: auto; margin-top: 15px; border-radius: 20px;">
            </div>
        </div>
        <?php }else{ ?>

            <div class="contenu-gauche">
                <div style="padding: 30px">
                    <a style="font-size: 150%;">Bienvenue dans un jeu fun et ludique qui va t'apprendre les bases du
                        développement en HTML et en PHP</a>
                </div>
                <form method="post" style="text-align: center; padding: 10%;">
                    <button type="submit" class="btn btn-primary start" name="start">Commencer</button>
                </form>
            </div>
            <div style="width: 70%; overflow: hidden; text-align: center; padding: 20px; margin-top: 20px;">
                <a style="font-size: 150%;">Dans le reste du site, vous allez trouver des informations sur le monde du numérique
                    et des aides qui vous permettront de vous lancer dans l'informatique.</a>
                <div>
                    <img src="images/image-code.png" alt="image de code" style="display: flex; width: 50%;  margin: auto; margin-top: 15px; border-radius: 20px;">
                </div>
            </div>

        <?php } ?>
    </div>


        <?php
        echo "<div class=\"blogs\">";
        include("blog.php");
        echo "<div>";

    }else{
    ?>


    <div class="jeu">
        <?php
        if ($niveauActuel != 0) {
            ?>
            <div class="quitter">
                <form method="post"">
                <button type="submit" class="btn btn-danger" name="skip">Quitter</button>
                </form>
            </div>
            <?php
        }
        if ($niveauActuel == 0) {
            // Affichez le contenu pour le niveau 0 ?>
           <div class="contenu-gauche">
                <div style="padding: 30px">
                    <a style="font-size: 150%">Bienvenue dans un jeu fun et ludique qui va t'apprendre les bases du
                        développement en HTML et en PHP</a>
                </div>
                <form method="post" style="text-align: center; margin-top: 30%">
                    <button type="submit" class="btn btn-primary start" name="suivant">Commencer</button>
                    <button type="submit" class="btn btn-secondary" name="skip">Passer le jeu</button>
                </form>
            </div>
            <div style="width: 70%; overflow: hidden">
                <img src="images/image-code.png" alt="image de code" style="display: flex; width: 100%; overflow: hidden">
            </div>
        <?php } else if ($niveauActuel == 1) {
            // Affichez le contenu pour d'autres niveaux ?>
            <div class="contenu-gauche">
                <pre style="background-color: black; color: ghostwhite; border-radius: 20px; "><div
                            style="background-color: darkgray; text-align: center; font-size: 20px; color: black;">Exemple HTML</div><code>
    &lt;body&gt;
        &lt;p&gt;Ceci est un paragraphe&lt;/p&gt;
        &lt;h1&gt; A H S O P &lt;/h1&gt;
        &lt;h2&gt; F T U E C &lt;/h2&gt;
        &lt;h3&gt; C G O A P &lt;/h3&gt;
        &lt;h4&gt; N S C Y E &lt;/h4&gt;
        &lt;h5&gt; Q W J I P &lt;/h5&gt;
        &lt;h6&gt; P M L S C &lt;/h6&gt;
    &lt;/body&gt;</code>
            </pre>
                <a style="font-size: 120%">
                    Pour écrire du texte en html on utilise les balises &lt;p&gt; pour faire des paragraphes et
                    les balises "&lt;h&gt;" pour faire des titres. <br> Les balises "&lt;h&gt;" fonctionnent de manière
                    hiérarchique en fonction du chiffre que l'on met a coté du h (1 étant le plus grand et 6 le plus
                    petit).
                    <br> A noter qu'il est nécessaire de fermer les balises en écrivant la meme balise qu'a l'ouverture
                    en rajoutant un "/".
                    Voici le résultat du code :
                </a>
                <div style="background-color: #FFFFFF; width: 90%; border-radius: 20px; color: #1E1E1E; margin-top: 15px; padding: 10px">
                    <div style="margin-left: 20px">
                        <p>Ceci est un paragraphe</p>
                        <h1> A H S O P </h1>
                        <h2> F T U E C </h2>
                        <h3> C G O A P </h3>
                        <h4> N S C Y E </h4>
                        <h5> Q W J I P </h5>
                        <h6> P M L S C </h6>
                    </div>
                </div>
            </div>
            <div class="contenu-droite">
                <h1>Entrer ce qui est écrit dans la plus petite balise titre</h1>
                <form action="" method="post" style="display: flex; flex-direction: column; align-items: flex-end;">
                    <textarea class="code-editor" style="height: 100px" name="reponseN1"
                              placeholder="Entrer votre réponse ici"><?php echo isset($_POST['reponseN1']) ? htmlspecialchars($_POST['reponseN1']) : ''; ?></textarea>
                    <br>
                    <button class="code-validation-button" type="submit">
                        <span style="font-weight: bold;">Répondre</span>
                    </button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reponseN1'])) {
                    // Récupérez la réponse saisi par l'utilisateur depuis le formulaire
                    $reponseN1 = strtoupper($_POST['reponseN1']);
                    $reponseN1 = str_replace(' ', '', $reponseN1);

                    // Vérifiez si a réponse est bonne
                    if ($reponseN1 == "PMLSC") {
                        // La réponse de l'utilisateur est bonne
                        $_SESSION['nbRepValide'] = $_SESSION['nbRepValide'] + 1;
                        echo '<div style="color: lawngreen; margin-top: 15px; font-size: 20px">Bonne réponse, bien joué !!</div>'; ?>
                        <form method="post" style="text-align: right;">
                            <button type="submit" class="code-validation-button" name="suivant"><span
                                        style="font-weight: bold;">Suivant</span></button>
                        </form>
                        <?php
                    } else {
                        echo '<div style="display: block;">';
                        echo '<div style="color: red; margin-top: 15px; font-size: 20px">Votre réponse n\'est pas bonne.</div>'; ?>
                        <form method="post" style="text-align: right;">
                            <button type="submit" class="code-validation-button" style="background-color: red;"
                                    name="suivant"><span style="font-weight: bold;">Passer</span></button>
                        </form>
                        </form><?php
                        echo '</div>';
                    }
                } ?>
            </div>
        <?php } else if ($niveauActuel == 2) {
            // Affichez le contenu pour d'autres niveaux ?>
            <div class="contenu-gauche">
                <pre style="background-color: black; color: ghostwhite; border-radius: 20px; "><div
                            style="background-color: darkgray; text-align: center; font-size: 20px; color: black;">Exemple HTML</div><code>
    &lt;body&gt;
        &lt;h1&gt;Liste de courses&lt;/h1&gt;
        &lt;ul&gt;
            &lt;li&gt;Pain&lt;/li&gt;
            &lt;li&gt;Lait&lt;/li&gt;
            &lt;li&gt;Œufs&lt;/li&gt;
            &lt;li&gt;Pommes&lt;/li&gt;
            &lt;li&gt;Pâtes&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/body&gt;</code>
            </pre>
                <a style="font-size: 120%">Le contenu principal de la page est placé dans la balise "&lt;body&gt;". <br>
                    À l'intérieur, nous avons un titre &lt;h1&gt; qui indique "Liste de courses".<br>

                    Ensuite, nous utilisons une liste non ordonnée "&lt;ul&gt;" pour créer la liste de courses. Chaque
                    élément de la liste est représenté par une balise "&lt;li&gt;". Les articles à acheter (pain, lait,
                    œufs, pommes, pâtes) sont énumérés sous forme d'éléments de liste. Voici le résultat :</a>
                <div style="background-color: #FFFFFF; width: 90%; border-radius: 20px; color: #1E1E1E; margin-top: 15px; padding: 10px;">
                    <h1 style="margin-left: 20px">Liste de courses</h1>
                    <ul style="margin-left: 20px">
                        <li>Pain</li>
                        <li>Lait</li>
                        <li>Œufs</li>
                        <li>Pommes</li>
                        <li>Pâtes</li>
                    </ul>
                </div>
            </div>
            <div class="contenu-droite">
                <h1>Faites une liste de 4 à 10 éléments : </h1>
                <form action="" method="post" style="display: flex; flex-direction: column; align-items: flex-end;">
                    <textarea class="code-editor" name="code"
                              placeholder="Saisissez votre code ici"><?php echo isset($_POST['code']) ? htmlspecialchars($_POST['code']) : ''; ?></textarea>
                    <br>
                    <button class="code-validation-button" type="submit">
                        <span style="font-weight: bold;">Exécuter</span>
                    </button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
                    ?>
                    <?php
                    // Récupérez le code HTML saisi par l'utilisateur depuis le formulaire
                    $codeHTML = $_POST['code'];

                    // Vérifiez si le code HTML contient un <body>, un <h1>, un <ul>, et entre 4 et 10 <li>
                    $containsBody = stripos($codeHTML, '<body') !== false;
                    $containsCloseBody = stripos($codeHTML, '</body') !== false;
                    $containsH1 = stripos($codeHTML, '<h1') !== false;
                    $containsUL = stripos($codeHTML, '<ul') !== false;
                    $containsLIs = preg_match_all('/<li/', $codeHTML, $matches);
                    if ($containsBody && $containsH1 && $containsUL && $containsCloseBody && $containsLIs >= 4 && $containsLIs <= 10) {
                        // Le code HTML de l'utilisateur répond aux conditions, nous pouvons l'exécuter
                        $_SESSION['nbRepValide'] = $_SESSION['nbRepValide'] + 1;
                        echo '<div style="display: flex; flex-direction: column; align-items: flex-end;">';
                        echo '<div style="background-color: #FFFFFF; width: 100%; border-radius: 20px; color: #1E1E1E; margin-top: 15px; padding: 10px;">';
                        echo $codeHTML; // Affichez le code HTML de l'utilisateur

                        echo '</div>';
                        ?>
                        <form method="post">
                            <button type="submit" class="code-validation-button" name="suivant"><span
                                        style="font-weight: bold;">Suivant</span></button>
                        </form>
                        <?php
                    } else {
                        echo '<div style="display: block;">';
                        echo '<div style="color: red; margin-top: 15px; font-size: 160%">Votre code HTML ne remplit pas les conditions requises.</div> <form method="post" style="margin-right: 0px; text-align: right;">
                    <button type="submit" class="code-validation-button" style="background-color: red;" name="suivant"><span style="font-weight: bold;">Passer</span></button></form>';
                        echo '</div>';

                    }
                } ?>

            </div>
        <?php } else if ($niveauActuel == 3) {
            // Affichez le contenu pour d'autres niveaux ?>
            <div class="contenu-gauche">
                <div style="margin-top: 20px;">
                    <a style="font-size: 120%; margin-top: 30px">Vous venez de coder en HTML, c'est le langage qui est
                        utilisé pour structurer une page web et son contenu.<br><br>En faisant clique droit -> inspecter
                        sur une page internet vous pouvez voir le code HTML de la page. Vous pouvez même la
                        modifier.</a>
                </div>
                <div style="background-color: #FFFFFF; width: 90%; border-radius: 20px; color: #1E1E1E; margin-top: 40px; padding: 20px; font-size: 20px; text-align: center;">
                    <a>Inspectez le carré blanc pour trouver le mot de passe cacher ici</a>
                    <!-- ###################################################
                         ##############     MDP : FR<TI     ################
                         ###################################################-->
                </div>
                <div style="margin-top: 20px;">
                    <a style="font-size: 120%; margin-top: 30px">Quand vous êtes dans le menu inspecté, vous pouvez voir
                        le code d'un élément en cliquant sur le curseur en haut à gauche qui ressemble à ça :</a>
                    <div style="text-align: center; margin-top: 20px">
                        <img src="images/image-cursor.png" style="border-radius: 20px">
                    </div>
                </div>
            </div>
            <div class="contenu-droite">
                <h1>Notez votre réponse ici</h1>
                <form action="" method="post" style="display: flex; flex-direction: column; align-items: flex-end;">
                    <textarea class="code-editor" style="height: 100px" name="reponseN1"
                              placeholder="Entrer votre réponse ici"><?php echo isset($_POST['reponseN1']) ? htmlspecialchars($_POST['reponseN1']) : ''; ?></textarea>
                    <br>
                    <button class="code-validation-button" type="submit">
                        <span style="font-weight: bold;">Répondre</span>
                    </button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reponseN1'])) {
                    // Récupérez la réponse saisi par l'utilisateur depuis le formulaire
                    $reponseN1 = strtoupper($_POST['reponseN1']);
                    $reponseN1 = str_replace(' ', '', $reponseN1);

                    // Vérifiez si a réponse est bonne
                    if ($reponseN1 == "FR<TI") {
                        // La réponse de l'utilisateur est bonne
                        $_SESSION['nbRepValide'] = $_SESSION['nbRepValide'] + 1;
                        echo '<div style="color: lawngreen; margin-top: 15px; font-size: 20px">Bonne réponse, bien joué !!</div>'; ?>
                        <form method="post" style="text-align: right;">
                            <button type="submit" class="code-validation-button" name="suivant"><span
                                        style="font-weight: bold;">Suivant</span></button>
                        </form>
                        <?php
                    } else {
                        echo '<div style="display: block;">';
                        echo '<div style="color: red; margin-top: 15px; font-size: 20px">Votre réponse n\'est pas bonne.</div>'; ?>
                        <form method="post" style="text-align: right;">
                            <button type="submit" class="code-validation-button" style="background-color: red;"
                                    name="suivant"><span style="font-weight: bold;">Passer</span></button>
                        </form>
                        </form><?php
                        echo '</div>';
                    }
                } ?>
            </div>
        <?php } else if ($niveauActuel == 4) {
            // Affichez le contenu pour d'autres niveaux ?>
            <div class="contenu-gauche">
                <pre style="background-color: black; color: ghostwhite; border-radius: 20px; "><div
                            style="background-color: darkgray; text-align: center; font-size: 20px; color: black;">Exemple PHP</div><code>
    &lt;?php
        $n1 = 3;
        $n2 = 17;
        $n3 = $n1 + $n2;
        echo $n3;
    ?&gt; </code>
            </pre>
                <a style="font-size: 120%">
                    Pour faire des calculs, on peut utiliser le PHP et utiliser des variables qu'on initialise avec un
                    "$"
                    pour faire des opérations. Après avoir initialisé les variables, on peut utiliser des opérateurs
                    comme +, -, et *
                    pour additionner, soustraire et multiplier différentes variables entre elles.
                    A noter qu'il ne faut pas oublier les "$" pour les variables, les ";" à la fin de chaque ligne
                    et le "echo" qui permet d'envoyer le résultat du calcul.<br>Voici le résultat de l'exemple :
                </a>
                <div style="background-color: #FFFFFF; width: 90%; border-radius: 20px; color: #1E1E1E; margin-top: 15px; padding: 10px;">
                    <h4 style="margin-left: 20px">20</h4>
                </div>
            </div>
            <div class="contenu-droite">
                <h1>Ecrire un code qui renvoie votre âge</h1>
                <form action="" method="post" style="display: flex; flex-direction: column; align-items: flex-end;">
                    <textarea class="code-editor" name="code"
                              placeholder="Saisissez votre code ici"><?php echo isset($_POST['code']) ? htmlspecialchars($_POST['code']) : ''; ?></textarea>
                    <br>
                    <button class="code-validation-button" type="submit">
                        <span style="font-weight: bold;">Exécuter</span>
                    </button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
                    ?>
                    <?php
                    // Récupérez le code HTML saisi par l'utilisateur depuis le formulaire
                    $codePHP = $_POST['code'];
                    $result = null;
                    try {
                        ob_start(); // Démarre l'output buffering
                        eval($codePHP); // Exécute le code sans afficher directement
                        $result = ob_get_clean(); // Récupère la sortie et la stocke dans la variable $result

                    } catch (Throwable $e) {
                        echo "<a style='color: red; margin-top: 15px; font-size: 160%'>Veuillez entrer du code valide</a>";
                    }
                    // Vérifiez si le code HTML contient un <body>, un <h1>, un <ul>, et entre 4 et 10 <li>
                    if ($result > 0 && $result <= 100) {
                        // Le code HTML de l'utilisateur répond aux conditions, nous pouvons l'exécuter
                        $_SESSION['nbRepValide'] = $_SESSION['nbRepValide'] + 1;
                        echo '<div style="display: flex; flex-direction: column; align-items: flex-end;">';
                        echo '<div style="background-color: #FFFFFF; width: 100%; border-radius: 20px; color: #1E1E1E; margin-top: 15px; padding: 10px;">';
                        echo $result; // Affichez le code HTML de l'utilisateur

                        echo '</div>';
                        ?>
                        <form method="post">
                            <button type="submit" class="code-validation-button" name="suivant"><span
                                        style="font-weight: bold;">Suivant</span></button>
                        </form>
                        <?php
                    } else {
                        echo '<div style="display: block;">';
                        echo '<div style="color: red; margin-top: 15px; font-size: 160%">Le code n\'est pas bon ou l\'age n\'est pas valide</div> <form method="post" style="margin-right: 0px; text-align: right;">
                            <button type="submit" class="code-validation-button" style="background-color: red;" name="suivant"><span style="font-weight: bold;">Passer</span></button></form>';
                        echo '</div>';

                    }
                } ?>

            </div>
        <?php } else if ($niveauActuel == 5) {
            // Affichez le contenu pour d'autres niveaux ?>
            <div class="contenu-gauche">
                <pre style="background-color: black; color: ghostwhite; border-radius: 20px; "><div
                            style="background-color: darkgray; text-align: center; font-size: 20px; color: black;">Exemple PHP</div><code>
    &lt;?php
        $s1 = "Pat";
        $s2 = "ate";
        $s3 = $s1 . $s2;
        echo $s3;
    ?&gt; </code>
            </pre>
                <a style="font-size: 120%">
                    Le PHP permet aussi de manipuler des chaînes de caractères. Pour initialiser des chaines de caractères
                    dans des variables, il faut mettre des guillemets de part et d'autre de la chaine de caractères.
                    On peut ensuite concatener c'est-à-dire assembler des chaines de caractères ensemble pour en créer des plus longues.
                    Pour ce faire il faut mettre un "." entre 2 variables. Ne pas oublier les "", les ";" et le echo
                    <br>Voici le résultat de l'exemple :
                </a>
                <div style="background-color: #FFFFFF; width: 90%; border-radius: 20px; color: #1E1E1E; margin-top: 15px; padding: 10px;">
                    <h4 style="margin-left: 20px">Patate</h4>
                </div>
            </div>
            <div class="contenu-droite">
                <h1>Ecrire un code qui renvoie votre prénom</h1>
                <form action="" method="post" style="display: flex; flex-direction: column; align-items: flex-end;">
                    <textarea class="code-editor" name="code"
                              placeholder="Saisissez votre code ici"><?php echo isset($_POST['code']) ? htmlspecialchars($_POST['code']) : ''; ?></textarea>
                    <br>
                    <button class="code-validation-button" type="submit">
                        <span style="font-weight: bold;">Exécuter</span>
                    </button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
                    ?>
                    <?php
                    // Récupérez le code HTML saisi par l'utilisateur depuis le formulaire
                    $codePHP = $_POST['code'];
                    $result = null;
                    try {
                        ob_start(); // Démarre l'output buffering
                        eval($codePHP); // Exécute le code sans afficher directement
                        $result = ob_get_clean(); // Récupère la sortie et la stocke dans la variable $result

                    } catch (Throwable $e) {
                        echo "<a style='color: red; margin-top: 15px; font-size: 160%'>Veuillez entrer du code valide</a>";
                    }
                    // Vérifiez si le code HTML contient un <body>, un <h1>, un <ul>, et entre 4 et 10 <li>
                    if (is_string($result) && $result != "") {
                        // Le code HTML de l'utilisateur répond aux conditions, nous pouvons l'exécuter
                        $_SESSION['nbRepValide'] = $_SESSION['nbRepValide'] + 1;
                        echo '<div style="display: flex; flex-direction: column; align-items: flex-end;">';
                        echo '<div style="background-color: #FFFFFF; width: 100%; border-radius: 20px; color: #1E1E1E; margin-top: 15px; padding: 10px;">';
                        echo $result; // Affichez le code HTML de l'utilisateur

                        echo '</div>';
                        ?>
                        <form method="post">
                            <button type="submit" class="code-validation-button" name="suivant"><span
                                        style="font-weight: bold;">Suivant</span></button>
                        </form>
                        <?php
                    } else {
                        echo '<div style="display: block;">';
                        echo '<div style="color: red; margin-top: 15px; font-size: 160%">Le code n\'est pas bon ou le prénom n\'est pas valide</div> <form method="post" style="margin-right: 0px; text-align: right;">
                            <button type="submit" class="code-validation-button" style="background-color: red;" name="suivant"><span style="font-weight: bold;">Passer</span></button></form>';
                        echo '</div>';

                    }
                } ?>

            </div>
        <?php }
        }
        ?>


    </div>

    </html>
</body>
</html>