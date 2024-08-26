<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teste de API</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="app.js" defer></script>
        <link rel="shortcut icon" href="content/icon_api.png" type="image/x-icon">
    </head>
    <body>
        <!--cabecalho-->
        <header class="bg-dark text-light pt-3 pb-2 mb-2 mb-md-3">
            <div class="container">
                <h1 class="text-center mb-0">Testando API's</h1>
                <p><i class="bi bi-github"></i> Leia o <a href="#">README</a> no repositório do projeto para mais informações</p>
            </div>
        </header>
        <!--inicio do conteudo principal-->
        <main class="d-grid justify-content-evenly">
            <div class="row text-dark rounded-4" style="background: #ddda">
                <div class="col-12 col-md-6 col-lg-4">
                    <!--inicio da area de busca de cep-->
                    <section id="local" class="container">
                        <h2 class="text-center pt-3">API para encontrar informações em base do CEP</h2>
                        <form class="input-group rounded py-2 d-flex flex-column gap-2 mb-3">
                            <div class="d-flex flex-row mb-2">
                                <input id="cep" class="w-75 rounded-start-5 rounded-end-0 text-center border-end-0" type="text" placeholder="Digite seu CEP (somente numeros)">
                                <button class="w-25 px-0 btn btn-danger border-0 rounded-start-0 rounded-end-5" type="button" onclick="receber_local()">Buscar</button>
                            </div>
                            <div class="d-flex flex-column row-gap-1">
                                <input id="rua" class="rounded w-100 ps-2" type="text" placeholder="Bairro" disabled>
                                <input id="bairro" class="rounded w-100 ps-2" type="text" placeholder="Bairro" disabled>
                                <input id="cidade" class="rounded w-100 ps-2" type="text" placeholder="Cidade" disabled>
                                <input id="estado" class="rounded w-100 ps-2" type="text" placeholder="Estado" disabled>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-12 col-md-6 col-lg-4 border">
                    <!--inicio da área de busca de empregos-->
                    <section id="trabalhos" class="container mb-3 mb-lg-0">
                        <h2 class="text-center pt-3">Scrapper API para buscar empregos em determinada região</h2>
                        <form id="form_trabalhos" class="input-group row-gap-1 mb-3" onsubmit="return enviar_formulario()">
                            <label for="emprego">Digite o emprego:</label>
                            <input name="emprego" class="w-100 ps-2 rounded" type="text" placeholder="Desenvolvedor web">
                            <label for="cidade">Digite a cidade:</label>
                            <input name="cidade" class="w-100 ps-2 rounded" type="text" placeholder="Curitiba">
                            <input class="d-block w-100 rounded btn btn-danger mt-2" type="submit" value="Buscar">
                        </form>
                        <section>
                            <!--iframe que recebe conteudos da pagina trabalhos.php via ajax-->
                            <iframe id="container_trabalhos" width="100%" height="380px" src="trabalhos.php" frameborder="0"></iframe>
                        </section>
                    </section>
                </div>
                <!--em construcao
                <div class="col-12 col-md-6 col-lg-4">
                    <--inicio da área de API pessoal-!->
                    <section>
                        <h2 class="text-center pt-3">API pessoal</h2>
                    </section>
                </div>
                -->
            </div>
        </main>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>