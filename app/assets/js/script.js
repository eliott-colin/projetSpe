let buttonSpectacle = document.querySelector('#spectacle');
let buttonWorkshop = document.querySelector('#workshop');
let optionUser = document.querySelector('.optionUser');
let a = optionUser.innerHTML;
console.log(a)
let formSpectacle = `
    <div class="containerSpectacle">
        <h2>Ajouter un Spectacle :</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nomSpectacle" required>
                <label>Date</label>
                <input type="date" name="date" required>
            </div>
            <div class="form-group">
                <label>Lieu</label>
                <input type="text" name="lieu" required>
                <label>Heure</label>
                <input type="time" name="heure" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" required></textarea>
            </div>
            <div class="form-group">
                <label>Catégorie</label>
                <input type="text" name="categorie" required>
            </div>
            <div class="button-container">
                <button type="submit">Créer un spectacle</button>
            </div>
        </form>
    </div>
                    `

let formWorkshop = `
<div class="containerSpectacle">
    <h2>Ajouter un Atelier :</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nomWorkshop" required>
            <label>Date</label>
            <input type="date" name="date" required>
        </div>
        <div class="form-group">
            <label>Lieu</label>
            <input type="text" name="lieu" required>
            <label>Heure</label>
            <input type="time" name="heure" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>
        <div class="form-group">
            <label>Theme</label>
            <input type="text" name="categorie" required>
        </div>
        <div class="form-group">
            <label>Animé par</label>
            `+ "<select class='optionUser' name='user'>" + a + "</select>" +`
        </div>
        <div class="button-container">
            <button type="submit">Créer un atelier</button>
        </div>
    </form>
</div>
                `

buttonSpectacle.addEventListener('click', ()=> {
    let bottomContainer = document.querySelector('.bottomContainer');
    let mainContainer = document.querySelector('.mainContainer');
    bottomContainer.classList.add('hidden');
    mainContainer.classList.add('bigContainer');
    mainContainer.innerHTML = formSpectacle;
    console.log('Spectacle button clicked');

});

buttonWorkshop.addEventListener('click', ()=> {
    let bottomContainer = document.querySelector('.bottomContainer');
    let mainContainer = document.querySelector('.mainContainer');
    bottomContainer.classList.add('hidden');
    mainContainer.classList.add('bigContainer');
    mainContainer.innerHTML = formWorkshop;
    console.log('Workshop button clicked');

});

console.log('Hello World!');