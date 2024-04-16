$(document).ready(function() {

    let = conteudo = {}
    $.getJSON("script/meuJson.json", function(data){
        conteudo = data
    })


    $("#btCarregar").click(function(){
        $.getJSON("script/meuJson.json", function(data){
            data.lista_de_sites.forEach(dado => {
                let text = document.createElement("p")
                let link = document.createElement("a")
                link.textContent = dado.nome
                link.href = dado.site
                text.appendChild(link)
                $("#area").append(text)
            });
        })
    })

    $("#btConsultar").click(function(){
        let result = ""
        conteudo.lista_de_sites.forEach(produto =>{
            produto.produtos.forEach(produtoUnitario =>{
                result += `<p>${produtoUnitario.nome} : ${produtoUnitario.preço}` 
            })
        })
        $("#area").html(result)
    })


});