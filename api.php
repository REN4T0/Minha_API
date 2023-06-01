<?php
    // Definir o usuário e senha de acesso a API

    $permitedUser = 'mineirin';
    $permitedPassword = 'Trembão@115';

    // Verificando as credenciais
    if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] !== $permitedUser || $_SERVER['PHP_AUTH_PW'] !== $permitedPassword) {
        header('HTTP/1.0 401 Unauthorized');
        echo 'Oquicequédimim sô';
        exit;
    }

    // Defina o cabeçalho para permitir o acesso de outros domínio (CROSS-ORIGIN)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Authorization, Content-Type');

    // Verifique o método da requisição
    $method = $_SERVER['REQUEST_METHOD'];

    // Verificar o endpoint
    $endpoint = $_GET['endpoint'];

    // Verificar os parâmetros
    $params = $_GET;

    // Define a resposta padrão
    $response = array(
        'status' => 'Error', 
        'message' => 'Quicequédimim, sô'
    );

    // Verifique o método e o endpoint para executar a API
    if($method == 'GET'){
        if($endpoint == 'users'){// conectar no banco de dados
            $servername = 'localhost';
            $username = 'trem';
            $password = 'paodequeijo@115';
            $dbname = 'queijocomgoiabadadb';

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifique se a conexão com o banco de dados deu certo

            if($conn->connect_error){
                $response = array(
                    'status' => 'error',
                    'message' => 'O trem num conectô, sô' . $conn->connect_error
                );
            }else{
                // Executar a consulta
                $sql = "SELECT * FROM mineirinhos";
                $result = $conn->query($sql);

                // Verifica se a consulta retornou os dados
                if($result->num_rows > 0){
                    $users = array();

                    // Pegar resultados e adicionar a um array
                    while($row = $result->fetch_assoc()){
                        $user = array(
                            'id' => $row['id'],
                            'name' => $row['name'],
                            'email' => $row['email']
                        );

                        $users[] = $user;
                    }
                    $response = array(
                        'status' => 'Success',
                        'users' => $users
                    );
                }else{
                    $response = array(
                        'status' => 'error',
                        'users' => []
                    );
                }
                
                // Fechar conexão com o banco
                $conn->close();
            }
        }
    }

    // Enviar as respostas
    echo json_encode($response);

?>