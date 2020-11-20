var acc = document.getElementsByClassName("module");

for (i = 0; i < acc.length; i++) {

    acc[i].addEventListener("click", function() {
        /* percorre os elementos que contem a classe accordion e quando achar o que 
        possuí a classe active, remove e interrompe o loop. */
        for(j = 0; j < acc.length; j++) {
            if(acc[j].classList.contains('active-module')) {
                acc[j].classList.remove('active-module');
                break;
            }
        }
        //adiciona a classe actie no item clicado.
        this.classList.add("active-module");

        //Pega os itens que tem a classe panel
        var panels = document.getElementsByClassName('class');
        
        /*percorre os itens que tem a classe panel para verificar se alguma está com a classe
        para exibir as aulas e quando encontrar, remove a classe */
        for(j = 0; j < panels.length; j++) {
            if(panels[j].classList.contains('active-class')) {
                panels[j].classList.remove('active-class');
                break;
            }         
        }

        //pega o proximo elemento após o item clicado e adiciona a classe para exibir o painel.
        var panel = this.nextElementSibling;
        panel.classList.add('active-class');

    });
}

var menu = document.querySelector('.menu');
var aside = document.querySelector('aside');
var main = document.querySelector('.main');

menu.addEventListener('click', function(){
    menu.classList.toggle('margin-left');
    aside.classList.toggle('hide-aside');
    main.classList.toggle('expand-main');
});