URL:

http://localhost/projeto-2/index.php


--------------------------------------------------------------
1. O que é o PHP e para que serve?
- Acho que é uma dúvida de muitos, talvez até não conheçam, mas já deve ter escutado e algum lugar "Ahh o PHP morreu", "O PHP vai morrer esse ano", o PHP mudou desde da versão 5 que dava muito b.o, inclusive para dar manuntenções, enfim, mas o PHP é uma liguagem de programação server-side, porém que podem ser utilizados junto a HTML,CSS e JavaScript para ser utilizado com FullStack, agora também em 2025 anunciou sua entrada para a área mobile, senão me engano há frameworks para ser utilizado para criação de apps desktop, então é utilizado para quase tudo agora, hoje é utilizado em mais de 70% das aplicações web, tanto em Wordpress, php puro, laravel dentre outros frameworks, porquê será que utilizam tanto assim o PHP? Porquê ela é uma linguagem de alto nível, ou seja, com uma sintaxe mais próxima da humana, por ser simples e ao mesmo tempo tem um enorme desempenho a frente de outras linguagens, tem uma comunidade imensa, ou seja, todo b.o que você passou, muitos já passaram e você não vai ficar preso naquele bug, está sempre se atualizando, dentre outros.


2. Como o cliente e servidor interpreta o PHP?
- O cliente que é você mesmo, clica ali numa página que utiliza a linguagem PHP, essa requisição que é feita pelo navegador, que por sua vez vai buscar no servidor, um arquivo, senão encontrar o arquivo ele retorna 404, se acontecer algo ele retorna outro método HTTP, porém se encontrar o arquivo, o servidor vai disponibilizar um template html com css e javascript, esse template é retornado ao navegador, "Aí vocês me perguntam ahhh mas não é um arquivo php?", mas o que acontece é que o navegador ele não entende PHP, ele entende HMTL,CSS e JavaScript, o que acontece no servidor? Pela requisição ele pode mandar tanto um template estático, quanto um template dinâmico, estático vai ser um template que não vai depender de variáveis, vai ser sempre o mesmo template, já o dinâmico através de variáveis setadas por exemplo, quero retornar um relatório de somente ontem, é um filtro, é algo dinâmico, e somente é retornado com aquelas informações setadas pela variável, o PHP vai lidar com isso no servidor, e retornar o template HTML,CSS e JavaScript para o navegador interpretar e ser mostrado na sua tela, em segundoos ou até milissegundos.


3. Como declarar variáveis?
- Tópico bem importante, porém é muito fácil, ainda mais para vocês que são veteranos, basta você inicializar com um '$' cifrão e colocar o nome da variável, e assim como JavaScript e outras linguagens colocar o sinal de igual e o valor, e terminar com ponto e virgula.


4. Tipagem:
- Tipagem estática ou dinâmica, qual é predominante no PHP? A dinâmica, a estática pode está sendo opcional e alguns frameworks PHP, porém a tipagem que você irá encontrar como padrão é a dinâmica, mas o quais são as diferenças? Praticamente a tipagem dinâmica quando você declara uma variável não precisa informar se é string, inteiro, pois o PHP já infere os tipos dinamicamente, normalmente fica como any que aceita todos tipos de dados,e aí quando recebe o valor se adapta a ele, porém para se certificar de certos valores você pode fazer filtros, verificações, seja com regex ou outra forma.


5. Variáveis Globais e exemplos:
- São arrays associativos pré-definidos do PHP, e acessível de qualquer parte do código, quando digo associativos pensem no Map do Java, que é chave-valor
- $_SESSION = armazena dados de requisições nua sessão, necessita do session_start() no início do script
- $_GET = Captura parâmetros da URL numa requisição, por exeplo pagina.php?nome=Maria, aí ele pode recuperar nome
- $_POST = Captura dados enviados por formulário


6. Estruturas condicionais:
- IF
```javascript 
    if($colorBlue === "Azul"){
        echo "A cor é " . echo $colorBlue;
    }
``` 

- IF ELSE
```javascript 
    if($colorBlue === "Azul"){
        echo "A cor é " . $colorBlue;
    } else if($colorRed === "Vermelho"){
        echo "A cor é " . $colorRed;
    }
```

- ELSE
```javascript 
    if($colorBlue === "Azul"){
        echo "A cor é " . $colorBlue;
    } else if($colorRed === "Vermelho"){
        echo "A cor é " . $colorRed;
    } else{
        echo "A cor é preta";
    }
```

- SWITCH CASE
```javascript 
    switch ($nameUser) {
        case 'Joca':
            echo "Meu nome é: " . $nameUser;
            break;

        case 'Caos':
            echo "Meu nome é: " . $nameUser;
            break;
        
        default:
            echo "Não tenho nome";
            break;
    }
```


7. Estrutura de repetição:
- DO WHILE
```javascript 
    do {
        $number = 0;
        echo $number;
        $number++;
    } while ($number <= 10);
    echo "Acabou";
``` 

- WHILE
```javascript 
    $number = 0;
    while ($number <= 10){
        echo $number;
        $number++;
    }
    echo "Acabou";
```

- FOR
```javascript 
    $numberArray = [0,1,2,3,4,5,6,7,8,9,10];
    for ($i=0; $i <= $numberArray; $i++) { 
        echo $numberArray[$i];
    }
```

- FOREACH
```javascript 
    $numberArray = [0,1,2,3,4,5,6,7,8,9,10];
    foreach ($numberArray as $key => $value) {
        echo $value;
    }
```

8. Paradigmas mais utilizados:
- POO e Procedural, tá mas qual a diferença? Eu comecei com a procedural, na qual o código literalmente vai executar linha por linha do início ao fim, enquanto no POO, você vai ter suporte aos seus pilares que são herança, polimorfismo, encapsulamento e abstração, e o código não vai ser executado linha por linha de cima para baixo, vai ser executado por exemplo um método que você queira rodar, ou seja, você tem mais controle, tem mais liberdade para definir o que quer executar e quando, mais indicado para projetos mais complexos, enquanto procedural é para projetos mais simples e didáticos.

9. Extensões para conexão com banco:
- Temos o MySQLi e o PDO, MySQLi é MySQL Improved ou MySQL melhorado, que é uma extensão específica ali para conectar o PHP com o MySQL e inclusive é a melhor opção se for trabalhar somente com MySQL, ela tem suporta tantos os modos procedural e orientado a objetos, enquanto o PDO ele é mais amplo permitindo trabalhar com diversos tipos de bancos de dados, ele tem suporte apenas a orientação a objetos, ele mais genérico então não tem muitas funções específicas a bancos igual ao mysqli, melhor opção para interagir com outros bancos fora o MySQL.


10. Dicas:
- Uma dica valiosa, é fazer uma separação de arquivos e pastas, isso vale muito, a pessoa que vai te avaliar já espera isso, então você já ganha um pouco a frente dos demais.
- Usar sempre os métodos "prepare" tanto do MySQLi e do PDO para evitar SQLInjection
- Usar :nomeDaColuna ou ?, para evitar SQLInjection na hora de escrever a query.
- Validar as entradas do usuário sempre, para evitar XSS temos um método chamado ``htmlspecialchars()`` e ``filter_var()```, ou quaquer outro tipo de filtro.
- Proteger senhas, seja com bcrypt, ou outro tipo de algoritmo, isso vai dar uma camada de proteção a mais a sua aplicação.
- Utilizar JWT, Sanctum, autenticação de terceiros, enfim cuidar da parte de autorização e autenticação.
- Fazer breves comentários, ou ainda melhor, fazer a documentação da sa aplicação, seja no arquivo README.md ou no Swagger.
- Essa pega muitos, o PHP simplesmente cospe os erros na tela do navegador, e você precisa ter cuidado quando for pra produção, á muito erro besta sendo jogado na tela, e as pessoas se aproveitarem disso. Utilize esses comandos para evitar isso 
```javascript
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'path/to/error.log');
``` 
- Usar ``try-catch`` em vez de ``die()`` ou ``exit`` para tratar melhor erros
- Sempre que o usuário refizer um login ou realizar algo importante, utilize esse comando para regenerar a sessão e evitar ataques de fixação de sessão
```javascript
session_regenerate_id()
```
- Evitar consultas desnecessárias ao banco, então utilize JOINS, índices para aumentar a perfomance, e evitar ao máximo subconsultas complexas.
- Utilizar as funções do PHP ``isset()`` e ``empty()`` corretamente para validar variáveis, ajudando a evitar erros e aumentar perfomance, já que são mais rápidas que outras funções.


11. Configurar php.ini
- extension=odbc | ODBC (Open Database Connectivity) é uma interface padrão para se conectar a diferentes tipos de bancos de dados, permitindo que você interaja com bancos como SQL Server, MySQL, PostgreSQL, entre outros.
- extension=pdo_mysql | PDO (PHP Data Objects) é uma interface para acessar bancos de dados de maneira mais flexível. O pdo_mysql é a implementação dessa interface para MySQL. Usando PDO, você pode trocar de banco de dados facilmente sem alterar o código.


12. Começar projeto