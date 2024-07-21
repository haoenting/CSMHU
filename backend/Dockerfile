# backend/Dockerfile
FROM php:8.3.8-cli

# 設定工作目錄
WORKDIR /var/www/html

# 安裝必要的擴展
RUN apt-get update && apt-get install -y libzip-dev zip unzip && docker-php-ext-install pdo_mysql zip

# 安裝 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 複製專案文件
COPY . .

# 安裝 Laravel 依賴
RUN composer install

# 開放應用的端口
EXPOSE 8000

# 設置啟動命令
CMD php artisan serve --host=0.0.0.0 --port=8000
