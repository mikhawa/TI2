<?php
var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/captcha.css">
</head>
<body>
<header id="titre">Livre d'or</header>
<main>
    <img src="img/email.png" alt="image email">
    <form id="formulaire" method="post" action="">
        <h2>Laissez-nous un message</h2>
        <h3 id="status" class=""></h3>
        <!--            <h3 id="status" class="OK">Votre message est enregistré, merci.</h3>-->
        <!--            <h3 id="status" class="Erreur">Une erreur s'est produite lors de l'enregistrement de votre message.</h3>-->
        <div class="field">
            <label for="prenom">Prénom *</label>
            <input type="text" name="gb_prenom" id="prenom" required>
        </div>
        <div class="field">
            <label for="nom">Nom</label>
            <input type="text" name="gb_nom" id="nom">
        </div>
        <div class="field">
            <label for="mail">E-mail *</label>
            <input type="email" name="gb_email" id="mail" required>
        </div>
        <div class="field">
            <label for="message">Message *</label>
            <textarea name="gb_msg" id="message" required></textarea>
        </div>
        <p style="color:white; font-size:1em;">(*) Ce champ est obligatoire</p>
        <div class="button">
            <input type="button" value="Envoyer" id="captchaValidate" name="envoi">
        </div>

    </form>
    <div id="captchaDiv">
        <p id="captcha"></p>
        <button id="captchaRefresh">Refresh</button>
        <input id="captchaInput" type="text" placeholder="Entrez le captcha" class="invalidCaptcha"><span></span>
    </div>
</main>
<aside>
    <h2>Messages précédents</h2>
    <article class="message">
        <p><a href="#">Lorem</a> a envoyé ce message le 01-02-2023 à 09h12</p>
        <p>Omnis cupiditate blanditiis delectus aliquam molestiae voluptatem modi. Facilis, doloremque. Recusandae veniam hic deserunt non dolorem fugiat quam incidunt exercitationem in pariatur voluptates cum ex ullam nesciunt dolorum mollitia, laudantium, necessitatibus corporis vitae? Laboriosam necessitatibus cumque ex rerum officia pariatur obcaecati commodi quo, iure autem in modi porro delectus atque voluptate tempora repellat corporis quam veniam fugiat eum quas, nobis, itaque expedita?</p>
    </article>
    <article class="message">
        <p><a href="#">Ipsum</a> a envoyé ce message le 25-01-2023 à 15h34</p>
        <p>Corrupti in libero tempore sed totam distinctio ea? Eaque distinctio consequatur cum officia facere, dignissimos fuga deserunt sunt ipsum dolorem et molestias magni nostrum enim cumque! Maiores quos eos quidem laboriosam error quis, earum eum labore aliquid consectetur nostrum enim possimus reiciendis?</p>
    </article>
</aside>

<script src="js/captcha.js"></script>
</body>
</html>
