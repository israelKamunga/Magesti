const createArticleFormBtn = document.getElementById("ouvrirFormBtn");
const FermerPopupCreationArticle = document.getElementById("FermerPopupCreationArticle");

createArticleFormBtn.addEventListener("click",()=>{
    document.getElementById("createArticlePopup").style.display = "flex";
})

FermerPopupCreationArticle.addEventListener("click",()=>{
    document.getElementById("createArticlePopup").style.display = "none";
})


const dupliquerArticleBtn = document.getElementById("dupliquerArticleBtn");
const dupliquerArticlePopup = document.getElementById("dupliquerArticlePopup");
const BtnFermerPopupDupliquerArticle = document.getElementById("BtnFermerPopupDupliquerArticle");

dupliquerArticleBtn.addEventListener("click",()=>{
    dupliquerArticlePopup.style.display = "flex";
});

BtnFermerPopupDupliquerArticle.addEventListener("click",()=>{
    dupliquerArticlePopup.style.display = "none";
})

console.log(dupliquerArticleBtn);
console.log(dupliquerArticlePopup);
console.log(BtnFermerPopupDupliquerArticle);