<?php
    $data = json_decode(file_get_contents('servicos.php'), true);

    print_r($data);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>API</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="app.js" defer></script>
        <link rel="shortcut icon" href="content/images.png" type="image/x-icon">
    </head>
    <body>
        <header class="bg-dark text-center text-light py-4 mb-4">
            <h1>Teste API</h1>
        </header>
        <main class="container d-flex flex-column align-content-center justify-content-center">
            <form class="input-group input-group-lg rounded p-2 d-flex flex-column gap-2 mb-3" style="background: #eee;">
                <div class="d-flex flex-row mb-2">
                    <input id="cep" class="w-75 rounded-start-5 rounded-end-0 text-center fs-3" type="text">
                    <input class="w-25 btn btn-danger rounded-start-0 rounded-end-5" type="button" value="Buscar" onclick="get_location()">
                </div>
                <div class="d-flex flex-column row-gap-1">
                    <input id="rua" class="rounded w-100 fs-4 ps-2" type="text" placeholder="Bairro" disabled>
                    <input id="bairro" class="rounded w-100 fs-4 ps-2" type="text" placeholder="Bairro" disabled>
                    <input id="cidade" class="rounded w-100 fs-4 ps-2" type="text" placeholder="Cidade" disabled>
                    <input id="estado" class="rounded w-100 fs-4 ps-2" type="text" placeholder="Estado" disabled>
                </div>
            </form>
            <section id="servicos" class="">
            <!--
                <?php for($i = 1; $i <= 10; $i++) { ?>
            -->
                <article class="servico">
                    <img src="content/images.png">
                    <div class="informacoes">
                        <h2>Desenvolvedor web</h2>
                        <h3>Indeed</h3>
                        <div class="detalhes">
                            <p class="local"><i class="bi bi-pin-fill"></i>Curitiba - PR</p>
                            <p class="postado"><i class="bi bi-clock-fill"></i>Há 10 dias</p>
                            <p class="salario"><i class="bi bi-cash-stack"></i>R$ 1.000,00 a R$ 1.500,00</p>
                            <p class="tipo"><i class="bi bi-briefcase-fill"></i>Estágio</p>
                        </div>
                    </div>
                </article>
            <!--
                <?php } ?>
            -->

            </section>
        </main>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>