import { staff, noticias } from "./dados.js";

carregarNoticias();
carregarStaff();

function carregarNoticias(){
    const carrosselInner = document.querySelector(".carousel-inner");
    let conteudoX = "";
    
    for(let i=0;i<noticias.length;i++){
        let noticia = noticias[i];
        
        conteudoX += `<div class="carousel-item ${i==0 ? 'active' : ''}">
        <article class="noticia">
            <img src=${noticia.imagem} alt="Imagem notícia">
            <div class="conteudo">
            <h2>${noticia.titulo}</h2>
            <p>${noticia.descricao}</p>
            </div>
            </article>
            </div>`;
    }
    
    carrosselInner.innerHTML = conteudoX;
}

function carregarStaff(){
    const funcoes = ["dono", "presidente", "diretor", "administrador", "senior", "moderador"];
    
    const staffSection = document.querySelector("#staff");
    
    funcoes.forEach(funcao => {
        const linha = document.createElement("div");
        
        linha.classList.add("linha-staff");
        
        
        let usuarioComCargo = staff.filter(usuario => usuario.cargo == funcao);
        let conteudo = "";
        
        usuarioComCargo.forEach(usuario => {
            conteudo += `<article class="card-staff ${funcao}">
            <img src="${usuario.avatar}" alt="Avatar ${usuario.nome}">
            <h2>${usuario.nome}</h2>
            <p>${primeiraMaiuscula(usuario.cargo)}</p>
            </article>`;
        });
        
        linha.innerHTML += conteudo;
        staffSection.appendChild(linha);
    });
}


function primeiraMaiuscula(texto) {

    return texto.charAt(0).toUpperCase() + texto.slice(1);

}