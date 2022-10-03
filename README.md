## Instalação

No projeto **Inventory Handler** foram utilizados [Laravel](https://laravel.com/docs/9.x) v9+, [Livewire](https://laravel-livewire.com/) v2.x, o template [Symox](https://themesbrand.com/symox/) e [MySQL](https://www.mysql.com/).

O **objetivo principal** foi desenvolver uma plataforma de controle e lançamento de entradas e saídas de produtos, movimentações entre unidades e controle de estoque nas unidades.

Instale as dependencias e inicie o server.

```sh
git clone https://github.com/vverardO/inventory-handler.git
cd inventory-handler
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Leia
Abaixo algumas imagens referentes a aplicação, as interfaces estão bem intuitivas e creio que estão auto explicativas.
Caso queira visualizar antes de subir a aplicação local ou não possa subir, veja [este vídeo](https://www.youtube.com/watch?v=LZvS3o3_3Ik&ab_channel=ValentimVerardo) no youtube.

## Acesso
![Login](https://i.postimg.cc/mZy9s6Tp/login.png)
![Register](https://i.postimg.cc/wM2RQ3WY/register.png)

## Dashboard
Essa interface conta com seis widgets onde "Entradas", "Saídas", "Produtos Novos" e "Movimentações" são informações do dia vigente, "Produtos com a quantidade crítica" são os produtos de locais que estão abaixo da quantidade de alerta definida neles mesmos e "Top 5 maiores movimentações" são as movimentações com maior quantidade.
![Dashboard](https://i.postimg.cc/VN2qJSh7/dashboard.png)

## Usuários
![User-Create-Edit](https://i.postimg.cc/sXFWVkBq/user-create-edit.png)
![User-Index](https://i.postimg.cc/2yrBWn7x/user-index.png)

## Produto
![Product-Create-Edit](https://i.postimg.cc/VN0MPfNX/product-create-edit.png)
![Product-Index](https://i.postimg.cc/k4xbDTK4/product-index.png)

## Movimentações
![Movimentation-Create](https://i.postimg.cc/PJj1MgTY/movimentation-create.png)
![Movimentation-Index](https://i.postimg.cc/YCsgPGtp/movimentation-index.png)

## Entrada de Produto
![Entry-Create](https://i.postimg.cc/PxZmYXsd/entry-create.png)
![Entry-Index](https://i.postimg.cc/DfrrzwPg/entry-index.png)

## Saída de Produto
![Output-Create](https://i.postimg.cc/yxycpL85/output-create.png)
![Output-Index](https://i.postimg.cc/13twMchC/output-index.png)

## Unidade
![Place-Create-Edit](https://i.postimg.cc/HsTQ81SC/place-create-edit.png)
![Place-Index](https://i.postimg.cc/KvQtnpV3/place-index.png)
