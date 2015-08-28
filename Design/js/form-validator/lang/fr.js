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
(function($, window) {

    "use strict";

    $(window).bind('validatorsLoaded', function() {

        $.formUtils.LANG = {
            errorTitle: "Le formulaire n'a pas pu être envoyé !",
            requiredFields: "Ce champ est obligatoire",
            badTime: "Vous devez saisir une heure correcte",
            badEmail: "Vous devez saisir une adresse email valide",
            badTelephone: "Vous devez saisir une numéro valide",
            badSecurityAnswer: "Mauvaise réponse",
            badDate: "Vous devez saisir une date correcte",
            lengthBadStart: "Votre champ doit comporter ",
            lengthBadEnd: " caractères",
            lengthTooLongStart: "Votre champ doit faire au maximum ",
            lengthTooShortStart: "Votre champ doit faire au minimum ",
            notConfirmed: "Vous devez confirmer ce champ",
            badDomain: "Vous devez saisir un domaine correct",
            badUrl: "Vous devez saisir une URL correcte",
            badCustomVal: "Champ incorrect",
            andSpaces: " et des espaces",
            badInt: "Vous devez saisir un nombre",
            badSecurityNumber: "Veuillez saisir un numéro de sécurité sociale valide",
            badUKVatAnswer: "Vous devez saisir un numéro de TVA valide",
            badStrength: "Vous devez saisir un mot de passe plus robuste",
            badNumberOfSelectedOptionsStart: "Vous devez sélectionner au moins",
            badNumberOfSelectedOptionsEnd: " réponse",
            badAlphaNumeric: "Le champ doit compoter des caractères alphanumérques (az) et des chiffres",
            badAlphaNumericExtra: " et",
            wrongFileSize: "Le fichier que vous essayez de télécharger est trop grand (max %s)",
            wrongFileType: "Seuls les fichiers de type %s sont autorisés",
            groupCheckedRangeStart: "Choisissez entre",
            groupCheckedTooFewStart: "Ensuite, vous devez faire au moins",
            groupCheckedTooManyStart: "Vous ne pouvez pas faire plus de",
            groupCheckedEnd: " sélection",
            badCreditCard: "Vous avez entré un numéro de carte de crédit valide",
            badCVV: "Vous avez saisi un numéro de carte incorrect",
            wrongFileDim: "La taille de l'image est trop élevée,",
            imageTooTall: "l'image doit avoir pour hauteur",
            imageTooWide: "L'image doit avoir pour largeur",
            imageTooSmall: "l'image est trop petite",
            min: "moins",
            max: "max",
            imageRatioNotAccepted : "Le ration de l'image n\'est pas accepté"
        };

    });

})(jQuery, window);


