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
        <?php
        if(isset($viewmessage)):
        ?>
        <h3 id="status" class=""><?=$viewmessage?></h3>
        <?php
        endif;
        ?>
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

</main>
<div id="captchaDiv">
    <p id="captcha"></p>
    <button id="captchaRefresh">Refresh</button>
    <input id="captchaInput" type="text" placeholder="Entrez le captcha" class="invalidCaptcha"><span></span>
</div>
<aside>
    <?php
    if($nbMessage===0):
    ?>
        <h2>Pas encore de message</h2>
    <?php
    else:
    ?>
    <h2>Messages précédents</h2>
        <?php
        foreach ($formatMessage as $item):
        ?>
    <article class="message">
        <p><a href="mailto:<?=$item['usermail']?>"><?=$item['firstname']?> <?=$item['lastname']?></a> a envoyé ce message le <?=$item['datemessage']?></p>
        <p><?=$item['message']?></p>
    </article>
    <?php
        endforeach;
    endif;
    ?>

</aside>

<script src="js/captcha.js"></script>
</body>
</html>
