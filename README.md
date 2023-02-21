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
