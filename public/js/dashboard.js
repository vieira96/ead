var faBars = document.querySelector('.fa-bars');
var aside = document.querySelector('.aside');
faBars.addEventListener('click', function(){
    if(aside.classList.contains('show-aside')) {
        aside.classList.remove('show-aside');
        faBars.style.left = 0;
    } else {
        aside.classList.add('show-aside');
        faBars.style.left = 280 + 'px';
    }
});

function openForm(){
    var form = document.querySelector('.new');
    form.style.display = 'flex';
    form.style.position = "fixed";
}

function closeForm(){
    var form = document.querySelector('.new');
    form.style.display = 'none';
}