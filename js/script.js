const form = document.getElementById('loginForm');
const responseDiv = document.querySelector('#response .response'); // Selecionado dois elementos de uma vez, um pelo ID e o outro pela Classe

form.addEventListener('submit', function (event){
    event.preventDefault();

    // Obter os valores digitados pelo usuário
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Transformar em String
    const credentials = `${username}:${password}`;

    // Codificar as credenciais em Base64 - Uma das diversas formas de criptografar algo. Nesse caso, Base64 é a criptografia mais simples
    const encodedCredentials = btoa(credentials); // Comando para criptografar em Base64

    // Fazer uma solicitação em HTTP para a API
    fetch('http://localhost/Minha_API/api.php/?endpoint=users', {
        // Encapsulamento - seleciona tudo o que tem que enviar e coloca dentro de um pacote e o envia de uma forma segura
        headers:{
            'Authorization': `Basic ${encodedCredentials}` // Incluir as credenciais no cabealho de solicitação
        
        }
    })
    
    .then(response => response.json()) // Converte a resposta em json
    .then(data => {
        responseDiv.textContent = JSON.stringify(data, null, 2); // Forma de como a json vai vir organizada

    })
    .catch (error => {
        responseDiv.textContent = 'Uai, acabou o pão de queijo sô' + error.message;
    })


});