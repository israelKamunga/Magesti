/*Retour à la page precedente*/
document.getElementById("btnRetour").addEventListener("click",retourPagePrecedente);

function retourPagePrecedente(){
    window.history.back();
}

/*Imprimer la page*/
document.getElementById("btnImprimer").addEventListener("click",ImprimerEtiquette)

function ImprimerEtiquette(){
    window.print();
    window.history.back();
}