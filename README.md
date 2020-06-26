# EXPSR

<!--- Exemplos de badges. Acesse https://shields.io para outras opções. Você pode querer incluir informações de dependencias, build, testes, licença, etc. --->
![GitHub repo size](https://img.shields.io/github/repo-size/hsborges/progweb-template)
![GitHub contributors](https://img.shields.io/github/contributors/hsborges/progweb-template)

EXPSR é uma plataforma de armazenamento e compartilhamento de imagens com objetivo de expôr sua vida e trabalho por meio da fotografia.

<div align="center">
 <img src="publico/EXPSR_cloud_logo.png" height="300" />
</div>

## Pré-requisitos

Antes de iniciar, certifique-se de cumprir os seguintes requisitos:
<!--- Estes são alguns exemplos de requisitos. Adicione, duplique e remove como necessário --->
* Você deve possuir a última versão do `<linguagem/dependencia/etc>` instalado.
* Você deve possuir uma máquina `<Windows/Linux>`.
* Você deve possuir o git,php,mysql e ter instalado o composer 
* Você deve ler o `<terms>` dos termos de uso.

## Como executar
* Execute os comandos pelo cmd
* git clone https://github.com/JoseGabrielNF/EXPSR
* Entre na pasta e digite composer install
* copy .env.example .env
* Na pasta .env criada digite substitua o atributo "DB_DATABASE" pelo nome do seu banco de dados criado por um servidor 
* Execute o comando "php artisan migrate"
* Execute o comando "php artisan serve" para iniciar o servidor

## Usando EXPSR

Para usar EXPSR, siga os seguintes passos (exemplos):

* Abra o navegador e acesse a URL gerada
* Ao abrir a aplicação você poderá:
  * Fazer login, caso já tenha uma conta, ou
  * Realizar um novo cadastro.
* Ao entrarmos com um usuário podemos:
  * Criar um novo album de imagens:
    * Ao criar um novo album podemos adicionar um titulo e selecionar a visibilidade desse album, podendo ser "Público" ou "Privado".
  * Adicionar uma nova imagem:
    * Quando entramos em um album, já criado anteriormente, podemos adicionar novas imagens que irão compor esse album. Para isso devemos fazer o upload da imagem desejada e adicionar a descrição da imagem e sua visibilidade, podendo ser "Público" ou "Privado".
    * Por enquanto, ao adicionar uma imagem temos que atualizar a página ou adicionar outra imagem para que a mesma seja exibida.
  * Visualizar as miniaturas das imagens de um album.

*Descreva as principais atividades, e/ou fluxos, que são possíveis de serem realizadas na aplicação.*

## Contribuidores

As seguintes pessoas contribuiram para este projeto:

* [José Gabriel](https://github.com/JoseGabrielNF)
* [Tobias Argenton Gehlen](https://github.com/TobiasGehlen)
* [Vinícius Oliveira](https://github.com/oliveirabr)
* [Luiz Felipe de Oliveira](https://github.com/LuizFelps)
* [Rafael Cardenas Cardoso](https://github.com/Rafael-Eng)

## Licença de uso

<!--- Se não tiver certeza de qual, verifique este site: https://choosealicense.com/--->
Este projeto usa a seguinte licença: [MIT License](<https://github.com/JoseGabrielNF/EXPSR/blob/master/LICENSE>).
<!--- *Você também deve criar um arquivo chamado LICENSE no projeto*--->
