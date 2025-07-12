/*affichier ou fermer le formulaire creer un article*/
const createArticleFormBtn = document.getElementById("ouvrirFormBtn");
const FermerPopupCreationArticle = document.getElementById("FermerPopupCreationArticle");

createArticleFormBtn.addEventListener("click",()=>{
    document.getElementById("createArticlePopup").style.display = "flex";
})

FermerPopupCreationArticle.addEventListener("click",()=>{
    document.getElementById("createArticlePopup").style.display = "none";
})

/*afficher ou fermer le formulaire dupliquer article */
const dupliquerArticleBtn = document.getElementById("dupliquerArticleBtn");
const dupliquerArticlePopup = document.getElementById("dupliquerArticlePopup");
const BtnFermerPopupDupliquerArticle = document.getElementById("BtnFermerPopupDupliquerArticle");

dupliquerArticleBtn.addEventListener("click",()=>{
    dupliquerArticlePopup.style.display = "flex";
});

BtnFermerPopupDupliquerArticle.addEventListener("click",()=>{
    dupliquerArticlePopup.style.display = "none";
})

/* afficher ou fermer le formulaire imprimer des etiquettes*/
const imprimerEtiquetteBtn = document.getElementById("imprimerEtiquetteBtn");
const imprimerEtiquettePopup = document.getElementById("ImprimerEtiquettePopup");
const FermerPopupImprimerEtiquette = document.getElementById("FermerPopupImprimerEtiquette");

imprimerEtiquetteBtn.addEventListener("click",()=>{
    imprimerEtiquettePopup.style.display = "flex";
})

FermerPopupImprimerEtiquette.addEventListener("click",()=>{
    imprimerEtiquettePopup.style.display = "none";
})