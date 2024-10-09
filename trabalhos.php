<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projeto API - Serviços</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="shortcut icon" href="content/icon_api.png" type="image/x-icon">
        <style>
            a:has(article) {
                text-decoration: none;
                color: inherit;
            }
        </style>
    </head>
    <body id="trabalhos_page" style="background: #e8e8e8">
    <?php
        // reconhecer se o servidor recebeu a resposta do js
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            //variaveis com os valores do formulario
            $emprego = htmlspecialchars($_POST["emprego"]);
            $cidade = htmlspecialchars($_POST["cidade"]);
            //trocando espacos por %20 para a url reconhecer na pesquisa
            $str_emprego = str_replace(" ", "%20", $emprego);
            $str_cidade = str_replace(" ", "%20", $cidade);

            // iniciando sessão cURL
            $curl = curl_init();
            // configurações da API sendo utilizada (jSearch = https://rapidapi.com/letscrape-6bRBa3QguO5/api/jsearch/details)
            curl_setopt_array($curl, [
                //url original: "https://jsearch.p.rapidapi.com/search?query=Desenvolvedor%20web%20in%20Curitiba%2CBR&page=1&num_pages=1&date_posted=all"
                CURLOPT_URL => "https://jsearch.p.rapidapi.com/search?query=" . $str_emprego . "in%20" . $str_cidade ."%2CBR&page=1&num_pages=1&date_posted=all",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "x-rapidapi-host: jsearch.p.rapidapi.com",
                    "x-rapidapi-key: d1ec027c9dmshfd2d31884ff49cfp1c8b7djsn42d6791e8d8f"
                ],
            ]);
            
            // recuprando resposta da API
            $response = curl_exec($curl);
            // recuperando erro da API
            $err = curl_error($curl);
            // convertendo a resposta para array
            $lista_resposta = json_decode($response, true);
            // encerrando a sessão cURL
            curl_close($curl);

            // checando se recebeu um erro da API
            if ($err) {
                // mostrando o erro retornado pela API
                echo "cURL Error: " . $err;
            } else {
                // loop para recuperar dados do array e criar os elementos na página
                for($i = 0; $i < sizeof($lista_resposta["data"]); $i++) {
                    // recuperando os valores e inserindo em variáveis
                    // titulo da vaga
                    $vaga_titulo = $lista_resposta["data"][$i]["job_title"];
                    // site de onde a vaga foi recuperada
                    $site_empregador = $lista_resposta["data"][$i]["job_publisher"];
                    // link da vaga
                    $vaga_link = $lista_resposta["data"][$i]["job_apply_link"];
                    // logo do site onde a vaga foi recuperada
                    $logo_empregador = $lista_resposta["data"][$i]["employer_logo"];
                    // timestamp de quando a vaga foi postada
                    $vaga_timestamp = $lista_resposta["data"][$i]["job_posted_at_timestamp"];
                    // subtraindo o timestamp da vaga com o atual, convertendo segundos em dias e arredondando
                    $vaga_tempo_postada = round(((((time() - $vaga_timestamp) / 60) / 60) / 24));
                    // cidade da vaga
                    $vaga_cidade = $lista_resposta["data"][$i]["job_city"];
                    // Estado da vaga
                    $vaga_estado = $lista_resposta["data"][$i]["job_state"];
                    // valores minimos e máximos de salário da vaga
                    $vaga_min_salario = $lista_resposta["data"][$i]["job_min_salary"];
                    $vaga_max_salario = $lista_resposta["data"][$i]["job_max_salary"];

                    // fechando o php para criar corretamente o html
                    ?>
                    <!--inicio de artigo contendo vaga e informacoes-->
                    <a href="<?= $vaga_link ?>" target="_blank">
                        <article class="servico px-0 rounded">
                            <img src="<?= $logo_empregador ?>" alt="logo do site <?= $site_empregador?>">
                            <div class="informacoes">
                                <h3><?= $vaga_titulo ?></h3>
                                <h4><?= $site_empregador ?></h4>
                                <div class="detalhes">
                                    <p class="local"><i class="bi bi-pin-fill"></i><?= $vaga_cidade . " - " . $vaga_estado ?></p>
                                    <p class="postado"><i class="bi bi-clock-fill"></i>Postado à <?= $vaga_tempo_postada ?> dias</p>
                                    <?php 
                                    // tratativa para checar se a API retornou valores de salario e se são maiores que 0 (muitas vagas não informam)
                                    if( ($vaga_min_salario != null && $vaga_min_salario > 0) && ($vaga_max_salario != null && $vaga_max_salario > 0) ) { ?>
                                    <p class="salario"><i class="bi bi-cash-stack"></i><?= "R$ " . $vaga_min_salario . " a " . "R$ " . $vaga_max_salario ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </article>
                    </a>

                    <?php
                    // abrindo (acima) o php para manter o fluxo do loop corretamente
                    // fim do loop
                }
            }
        }
    ?>
    </body>
</html>