// função assincrona para recuperar localização pelo CEP
async function receber_local() {
    // recupera o valor inserido do CEP
    const cep = document.getElementById("cep").value
    // url para a API junto do CEP informado
    const url = "https://brasilapi.com.br/api/cep/v1/" + cep
    // fazendo o fetch da url acima e inserindo a resposta na variavel "resposta"
    const resposta = await fetch(url)
    //  recebendo a resposta em json e inserindo na variavel resultado
    let resultado = await resposta.json()

    // pegando resultados do json e inserindo em constantes 
    const rua = resultado.street
    const bairro = resultado.neighborhood
    const cidade = resultado.city
    const estado = resultado.state

    // recebendo os inputs do formulario e inserindo em constantes
    const rua_container = document.getElementById("rua")
    const bairro_container = document.getElementById("bairro")
    const cidade_container = document.getElementById("cidade")
    const estado_container = document.getElementById("estado")

    // inserindo as respostas da API nos inputs
    rua_container.value = rua
    bairro_container.value = bairro
    cidade_container.value = cidade
    estado_container.value = estado
}

// função para recuperar informacoes do php (trabalhos.php)
function enviar_formulario() {
    // constantes para recupear o formulario e section
    const form = document.getElementById("form_trabalhos")
    const section = document.getElementById("container_trabalhos")
    // instancia o objeto FormData para receber dados do formulario
    let form_data = new FormData(form)

    // instancia uma requisicao XML-HTTP
    let xhrequest = new XMLHttpRequest()
    // inicia a requisicao informando o metodo de envio de dados e arquivo
    xhrequest.open("POST", "trabalhos.php", true)
    // checa o estado da requisicao
    xhrequest.onload = () => {
        if (xhrequest.status === 200) {
            // atualiza o conteúdo do iframe com a resposta
            section.srcdoc = xhrequest.responseText
        } else {
            // caso ocorra algum erro no envio
            console.error("Erro ao enviar o formulário.")
        }
    }
    // envia os dados do formulario
    xhrequest.send(form_data)

    /*
    retorno falso para impedir que o formulario seja enviado para o
    php, o que mandaria o usuario para a pagina de trabalhos.php ao 
    inves de seguir com o ajax na pagina principal
    */
    return false
}