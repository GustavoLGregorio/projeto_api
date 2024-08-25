const rua_container = document.getElementById("rua")
const bairro_container = document.getElementById("bairro")
const cidade_container = document.getElementById("cidade")
const estado_container = document.getElementById("estado")

async function get_location() {
    const cep = document.getElementById("cep").value
    const url = "https://brasilapi.com.br/api/cep/v1/" + cep
    const response = await fetch(url)
    // result recebe "state city neighborhood street"
    let result = await response.json()

    console.log(result)

    const rua = result.street
    const bairro = result.neighborhood
    const cidade = result.city
    const estado = result.state

    rua_container.value = rua
    bairro_container.value = bairro
    cidade_container.value = cidade
    estado_container.value = estado

    
    get_job()
    async function get_job() {
        const url = "https://jsearch.p.rapidapi.com/search?query=Desenvolvedor%20web%20in%20" + cidade + "%2CBrasil&page=1&num_pages=1&date_posted=all"
        const options = {
        method: 'GET',
        headers: {
            'x-rapidapi-key': '0f818b5601mshe0ee11b0773ca27p1d973bjsn33c2ea6bf0d3',
            'x-rapidapi-host': 'jsearch.p.rapidapi.com'
        }}
        const response = await fetch(url, options);
        const result = await response.json();
    
       console.log(result)

       if(result) {
            send_to_php()
       }

       function send_to_php() {
            const url = "servicos.php"
            const options = {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(result)
            }
            fetch(url, options)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.error('Error:', error));
       }
    }
}