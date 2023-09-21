<hr class="horizontal-line" id="Blog">






<!--    <hr class="border border-danger border-5 opacity-100" >-->

<div>
    <h2>Blogs</h2>
</div>

<br>
<br>


<!--la place de la blog femme-->
<div class="modals3">
    <!-- ---------------------------------------------------->
    <?php
    include("blog_femmes.php");
    include("blog_jeunes.php");
    include("blog_inegalites.php");
    ?>
</div>

<br>


<div class="modals1">
    <?php

    include("blog_metiers.php");
    ?>

</div>

<br>
<hr class="horizontal-line" id="Aides">
<div>
    <h2>Aides</h2>
</div>

<div>
    <div class="tout-image">
        <div class="image " style="background: url(images/img_3.png) center/cover">
            <div class="text-container">
                <div class="text">
                    <h1>Formation gratuite financée par Pôle emploi </h1>
                    <p>Plus de 100 formations à distance gratuites et
                        rémunérées pour développer vos compétences dans le domaine du numérique sans perdre de temps
                        !<br>
                        <a href="https://candidat.pole-emploi.fr/formations/recherche;JSESSIONID_RECH_FORMATION=lvex60lclxJL4THiFh06NMfvHcW-egJ_-2HKhBwnUB_-cfh8pwNa!-1409002472?quoi=FORMACODE-31054&range=0-9&tri=0"
                           target="_blank"><b>Voir</b> </a>
                    </p>


                </div>
            </div>
        </div>

        <div class="image active" style="background: url(images/img_4.png) center/cover">
            <div class="text-container">
                <div class="text">
                    <h3> Un financement de 1 000 euros pour se former aux métiers du numérique</h3>
                    <p> Dans le cadre du plan France Relance, l’État apporte une aide
                        supplémentaire aux personnes souhaitant suivre une « formation du
                        domaine du numérique ». Il s’agit d’un abondement, qui s’ajoute au
                        solde de votre Compte personnel de formation (CPF). <br>
                        <a href="https://www.blogdumoderateur.com/financement-former-metiers-numerique/"
                           target="_blank"><b>Voir</b></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="image" style="background: url(images/w3schools.png) center/cover">
            <div class="text-container">
                <div class="text">
                    <p> W3Schools est un site web destiné à l'apprentissage en ligne des technologies web.
                        Son contenu inclut des didacticiels et des références relatives aux langages et frameworks
                        suivants: HTML, CSS, JavaScript, SQL, Python, Java, PHP, Bootstrap, W3.CSS, C, C++, C#, React,
                        R, jQuery, Django, TypeScript, JSON, AngularJS etc...<br>
                        <a href="https://www.w3schools.com/" target="_blank"><b>Voir</b></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="image" style="background: url(images/img_5.png) center/cover">
            <div class="text-container">
                <div class="text">
                    <h3># Université - Formation - Vie étudiante , Étudiants</h3>
                    <p> L'Université d'Évry a mis en place des dispositifs d’aide pour accéder au numérique afin
                        d'assurer
                        une continuité pédagogique dans le cadre de vos études.<br>
                        <a href="https://www.univ-evry.fr/toute-lactualite/actualites-vie-de-campus/rentree-2023/dispositifs-daides-pour-acceder-au-numerique.html"
                           target="_blank"><b>Voir</b></a>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-------------------------------------javascript---------------------------------------------------->
    <script>
        let click = $(".image").click(function () {
            $(".image").removeClass("active");
            $(this).addClass("active");
        });
    </script>
    <!-------------------------------------javascript---------------------------------------------------->

</div>

<br><br>

<footer class="footer">
    <div class="copyright">
        &copy; 2023 Mon Site. Tous droits réservés.
    </div>
</footer>