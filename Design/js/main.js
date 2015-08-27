/**
 * jQuery Form Validator
 * ------------------------------------------
 *
 * French language package
 *
 * @website http://formvalidator.net/
 * @license Dual licensed under the MIT or GPL Version 2 licenses
 * @version 2.2.53
 */

var myLanguage = {
    errorTitle: "Le formulaire n'a pas pu être envoyé !",
    requiredFields: "Ce champ est obligatoire",
    badTime: "Vous devez saisir une heure correcte",
    badEmail: "Vous devez saisir une adresse email valide",
    badTelephone: "Vous devez saisir une numéro valide",
    badSecurityAnswer: "Mauvaise réponse",
    badDate: "Vous devez saisir une date correcte",
    lengthBadStart: "Votre réponse doit comporter entre",
    lengthBadEnd: " caractères",
    lengthTooLongStart: "Vous avez entré une réponse qui est plus long que",
    lengthTooShortStart: "Vous avez entré une réponse qui est plus courte que",
    notConfirmed: "Vous devez confirmer ce champ",
    badDomain: "Vous devez saisir un domaine correct",
    badUrl: "Vous devez saisir une URL correcte",
    badCustomVal: "Re-taper une réponse incorrecte",
    andSpaces: " et des espaces",
    badInt: "Vous devez saisir un nombre",
    badSecurityNumber: "Vous avez entré un mauvais numéro de sécurité sociale",
    badUKVatAnswer: "Vous avez pas entré un numéro de TVA au Royaume-Uni",
    badStrength: "Vous avez entré un mot de passe qui ne soit pas suffisamment en sécurité",
    badNumberOfSelectedOptionsStart: "Vous devez sélectionner au moins",
    badNumberOfSelectedOptionsEnd: " réponse",
    badAlphaNumeric: "Vous ne pouvez répondre avec alfanumersika caractères (az) et des chiffres",
    badAlphaNumericExtra: " et",
    wrongFileSize: "Le fichier que vous essayez de télécharger est trop grand (max %s)",
    wrongFileType: "Seuls les fichiers de type %s est autorisée",
    groupCheckedRangeStart: "Choisissez entre",
    groupCheckedTooFewStart: "Ensuite, vous devez faire au moins",
    groupCheckedTooManyStart: "Vous ne pouvez pas faire plus de",
    groupCheckedEnd: " sélection",
    badCreditCard: "Vous avez entré un numéro de carte de crédit valide",
    badCVV: "Vous avez saisi un CVV incorrecte",
    wrongFileDim: "Illégal taille de l'image,",
    imageTooTall: "l'image ne peut pas être plus élevé que",
    imageTooWide: "l'image ne peut pas être plus large que",
    imageTooSmall: "l'image est trop petite",
    min: "moins",
    max: "max",
    imageRatioNotAccepted : "Ratio de l'image est pas acceptée"
};

$.validate({
    lang: myLanguage
});

