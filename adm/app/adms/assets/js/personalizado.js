function previewImagem(){
    var imagem = document.querySelector('input[id=imagem_nova]').files[0];
    var preview = document.querySelector('#preview-img');
    var reader = new FileReader();
    reader.onloadend = function(){
        preview.src = reader.result;
    };

    if(imagem){
        reader.readAsDataURL(imagem);

        }else{
            preview.src = "";
        }
    }


    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

function toggleMenu(){
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let maindash = document.querySelector('.maindash');
    let bilist = document.querySelector('.bilist');
    let topbar = document.querySelector('.topbar');
    let detalhes = document.querySelector('.detalhes');




    navigation.classList.toggle('active');
    toggle.classList.toggle('active');
    maindash.classList.toggle('active');
    bilist.classList.toggle('active');
    topbar.classList.toggle('active');
    detalhes.classList.toggle('active');



}