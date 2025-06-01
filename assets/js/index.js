console.log("Hello word");

let createArticleFormBtn = document.getElementById("ouvrirFormBtn");
let FermerPopupCreationArticle = document.getElementById("FermerPopupCreationArticle");

createArticleFormBtn.addEventListener("click",()=>{
    document.getElementById("createArticlePopup").style.display = "flex";
})

FermerPopupCreationArticle.addEventListener("click",()=>{
    document.getElementById("createArticlePopup").style.display = "none";
})