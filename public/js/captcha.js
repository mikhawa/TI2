/* Fonction qui génère un captcha qui sera inséré dans un élément avec l'id "captcha"
et qui nécessite un callback qui sera appellé lorsque le captcha est validé
ainsi qu'une longueur de captcha pour la génération */
function captchaCF2M(callback, captchaLen) {

    function randomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min)
    }

    // Retourne un array contenant autant d'élements venant de "array" que "numberOfElements"
    function getElementsFromArray(array, numberOfElements) {
        let arrayOfElements = [];
        for (let i = 0; i < numberOfElements; i++) {
            let randomElement = array[randomInt(0, array.length - 1)];
            arrayOfElements.push(randomElement);
        }
        return arrayOfElements
    }

    // Vide le contenu de l'élément avec l'id "captcha" et y insère un nouveau captcha
    function generateCaptcha() {
        captcha.innerHTML = "";
        captchaInput.value = "";

        let captchaArray = getElementsFromArray(allCharacters, captchaLen);
        console.log("generateCaptcha : " + captchaArray);

        for (let i = 0; i < captchaArray.length; i++) {
            let colors = randomRGB(); //
            let size = randomSize(16,24);
            captcha.insertAdjacentHTML('beforeend', `<span style="color: rgb(${colors[0]}, ${colors[1]}, ${colors[2]}); font-size: ${size}em">${captchaArray[i]}</span>`);
        }
    }

    // Vérifie si l'entrée utilisateur correspond au captcha et appelle le callback
    // sinon génère un nouveau captcha
    function validateCaptcha() {
        console.log("validateCaptcha - captcha : "+captcha.textContent);
        console.log("validateCaptcha - Input : "+captchaInput.value);

        if (captcha.textContent === captchaInput.value) {
            console.log("validateCaptcha - Valide");
            captchaInput.classList.remove("invalidCaptcha");
            captchaInput.classList.add("validCaptcha");
            setTimeout(callback,2000);
        } else {
            console.log("validateCaptcha - Invalide");
            captchaInput.classList.add("invalidCaptcha");
            generateCaptcha(captchaLen);
        }
    }

    function randomRGB() {
        let arrayRGB = [];

        for (let i = 0; i < 3; i++) {
            arrayRGB.push(randomInt(21, 255));
        }
        // randomInt(min, max)
        return arrayRGB
    }

    function randomSize(min,max) {
        return randomInt(min, max) / 10
    }

    const allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    const captcha = document.querySelector('#captcha');
    const captchaInput = document.querySelector('#captchaInput');
    const captchaValidate = document.querySelector('#captchaValidate');
    const captchaRefresh = document.querySelector('#captchaRefresh');

    generateCaptcha(captchaLen);
    captchaValidate.addEventListener('click', validateCaptcha);
    captchaRefresh.addEventListener('click', generateCaptcha);
}

function redirection() {
    /* document.location = "https://duckduckgo.com"; // Redirection vers un site */
    document.querySelector("#formulaire").requestSubmit(); // Envoyer un formulaire
}

captchaCF2M(redirection, 6);