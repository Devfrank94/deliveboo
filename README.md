<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Deliveboo

DeliveBoo è una web app che permette di ordinare cibo a domicilio nella città di Roma.

Permette agli utenti di cercare i loro cibi preferiti, preparati dai loro ristoranti di fiducia. Tutto rimanendo comodamente sul divano di casa.

## Step da seguire per inizializzare il progetto

1. aprire il progetto su vscode
2. aprire un nuovo terminale da dividere, e nel primo inserire
```
npm i // nel caso dia errore npm i --force
```
```
composer install
```

3. Copiare il file env e generare una nuova key con il comando e configurarlo con parametri db personale
```
php artisan key:generate
```

4. creare con comando cartella di storage virtuale e cancellare la vecchia storage se presente (se si hanno problemi di visualizzazione)
```
php artisan storage:link
```

5. Avviare in due diversi terminali per visualizzare il progetto

```
npm run dev
```
```
php artisan serve
```
