# EXPSR

<!--- Exemplos de badges. Acesse https://shields.io para outras opções. Você pode querer incluir informações de dependencias, build, testes, licença, etc. --->
![GitHub repo size](https://img.shields.io/github/repo-size/JoseGabrielNF/EXPSR?style=flat-square)
![GitHub contributors](https://img.shields.io/github/contributors/JoseGabrielNF/EXPSR?style=flat-square)

EXPSR é uma plataforma de armazenamento e compartilhamento de imagens com objetivo de expôr sua vida e trabalho por meio da fotografia.

## Pré-requisitos

Antes de iniciar, certifique-se de cumprir os seguintes requisitos:
<!--- Estes são alguns exemplos de requisitos. Adicione, duplique e remove como necessário --->
* Você deve possuir a última versão do `Git, PHP, MySQL, XAMPP e Composer` instalados.
* Você pode possuir uma máquina `Windows ou Linux`.

## Como executar
* Execute os comandos pelo cmd
* `git clone https://github.com/JoseGabrielNF/EXPSR`
* `cd EXPSR`
* `composer install`
* `copy .env.example .env`
* Inicie o MySQL pelo Xampp e crie um banco de dados
* Abra o arquivo .env criado e substitua o atributo "DB_DATABASE" pelo nome do seu banco de dados criado por um servidor 
* Execute os comandos
* `php artisan key:generate`
* `php artisan migrate`
* `php artisan serve` 

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
    * Quando entramos em um album, já criado anteriormente, podemos adicionar novas imagens que irão compor esse album. Para isso devemos fazer o upload da imagem desejada e adicionar uma descrição.
  * Visualizar as miniaturas das imagens de um album.
* Ao visualizar uma imagem:
    * É visível o autor da imagem e sua foto de perfil.
    * É possível curtir ou descurtir uma imagem, afetando o contador de curtidas.
    * É visível a descrição da imagem feita pelo autor no ato de upload.
    * Exluir a imagem se for o dono dela.
* Ao acessar um perfil:
    * É apresentado os álbuns, seguidores e quem segue este perfil.
    * Acionar o botão para seguir o perfil.
* Explorar imagens da rede:
    * Nesta página é possível visualizar fotos de outros usuários.
    * Somente fotos em álbuns públicos aparecem em Explorar.
    * Aqui você descobre outros usuários para montar sua rede social de seguidores.

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
