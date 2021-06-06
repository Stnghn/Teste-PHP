'use strict';

const preencheForm = (xml) =>{
    let base = xml.getElementsByTagName("xmlcep")[0];
    console.log(base);
    let rua = xml.getElementsByTagName("logradouro")[0].childNodes[0];
    let bairro = xml.getElementsByTagName("bairro")[0].childNodes[0];
    let cdd = xml.getElementsByTagName("localidade")[0].childNodes[0];
    let uf = xml.getElementsByTagName("uf")[0].childNodes[0];
    let ddd = xml.getElementsByTagName("ddd")[0].childNodes[0];
    if (rua == null || bairro == null || cdd == null || uf == null || ddd == null) {
        let escreve = document.getElementById("aviso-incorreto");
        escreve.innerHTML = "Alguns campos não foram encontrados e isso impediu a execução. Tente outro CEP.";
    } else {
        document.getElementById("rua").value = base.getElementsByTagName("logradouro")[0].firstChild.data;
        document.getElementById("bairro").value = base.getElementsByTagName("bairro")[0].firstChild.data;
        document.getElementById("cdd").value = base.getElementsByTagName("localidade")[0].firstChild.data;
        document.getElementById("uf").value = base.getElementsByTagName("uf")[0].firstChild.data;
        document.getElementById("ddd").value = base.getElementsByTagName("ddd")[0].firstChild.data;
        let escreve = document.getElementById("aviso-incorreto");
        escreve.innerHTML = "";
        document.getElementById("search").style.background = '#AA2C13';
        document.getElementById("search").disabled = true;
    } 
} 

const buscarCep = () => {
    const cep = document.getElementById('cep').value
    console.log(cep)
    const validarcep = /^[0-9]{8}$/;
    if (validarcep.test(cep)) {
        const url = `https://viacep.com.br/ws/${cep}/xml/`;
        fetch(url)
        .then(response => response.text())
        .then(data => {
        let convert = new DOMParser();
        let xml = convert.parseFromString(data, "application/xml") 
        console.log(xml)
        if (xml.getElementsByTagName("erro").length > 0) {
            let escreve = document.getElementById("aviso-incorreto");
            escreve.innerHTML = "Ocorreu um erro.";
        }else {
           preencheForm(xml)  
       } 
    })
    } else {
        let escreve = document.getElementById("aviso-incorreto");
        escreve.innerHTML = "";
        escreve.innerHTML = "Formato de CEP incorreto. Verifique e tente novamente.";
    }   
}

document.getElementById('search')
        .addEventListener('click',buscarCep);