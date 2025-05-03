
let UsernameField = document.getElementById("username");
let passwordfield = document.getElementById("password");
let LoginButton = document.getElementById("login");

LoginButton.addEventListener("click",login);



function login(){
    fetch("http://localhost/GESTIONSTOCK/Api/index.php?operation=connexion&UserName=IsraelKamunga&Password=Isy_ART8")
    .then(response=>{
        return response.json();
    })
    .then(response=>{
        console.log(response);
    })
}