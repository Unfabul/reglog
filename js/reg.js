let login = document.getElementById('reg-form');
login.addEventListener('submit', function(e){
    e.preventDefault();

    let path = '../admin/reg-ajax.php?';

    for(let i = 0; i < this.elements.length; i++){
        path += `${this.elements[i].name}=${this.elements[i].value}&`;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('get', path);
    xhr.send();

    xhr.addEventListener('load', ()=>{
        document.querySelector('.success-state').innerHTML = xhr.responseText;
        this.style.display = "none";
    });
});