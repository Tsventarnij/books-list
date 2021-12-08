
## Books list

To start project:

- git clone https://github.com/Tsventarnij/books-list.git books-list 
- cd books-list/
- composer install
- cp .env.example .env
- ./vendor/bin/sail up
- alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
- sail artisan key:generate
- sail artisan migrate
- sail artisan db:seed
