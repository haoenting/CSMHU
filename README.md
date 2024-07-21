# CSMUH-CRS
## Introduction
Used to store patient data
For HomePage, you can create your own account by typing the account and password.
After that, you can select different button for each action.
The insert page can create a new patients' record into the database.
The modify page can select the patient and modify the datas.

# 建置環境
## 前端
前端使用React進行開發
首先安裝Node.js(其中包括npm, npx)
```sh
npx create-react-app frontend
```

## 後端
使用laravel進行開發
https://laravel.dev.org.tw/docs/11.x/routing



# 伺服器配置
## 前端
由於React自帶伺服器功能（預設端口3000）
所以在啟用React app後便能自動運行
```sh
npm start
```

## 後端
需要將laravel建置在apache上

1. 打開 httpd.conf 文件
```sh
sudo nano /etc/apache2/httpd.conf
```

確保有以下內容
```sh
LoadModule proxy_module modules/mod_proxy.so
LoadModule proxy_http_module modules/mod_proxy_http.so
...
# Virtual hosts
Include /etc/apache2/extra/httpd-vhosts.conf
```

crtl+o 保存文件後enter
ctrl+x退出編輯器

2. 打開 /etc/apache2/extra/httpd-vhost.conf
對laravel進行配置
```sh
<VirtualHost *:80>
    ServerName laravel-app.local
    DocumentRoot "/Users/tinghaoen/CSMHU/backend/public"
    
    <Directory "/Users/tinghaoen/CSMHU/backend/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

3. 到laravel資料夾中啟用服務
sudo apachectl restart

## 前後端連線
由於前後端都在本機，所以可以透過調用api直接連線來交換資料
1. 打開 /etc/apache2/extra/httpd-vhost.conf
並於其中添加規則讓ip連線到預設port:3000
以及本地api服務，連線到port:80(Laravel的預設端口)
```sh
<VirtualHost *:80>
    ServerName localhost

    # Proxy settings for React
    ProxyRequests Off
    ProxyPreserveHost On
    ProxyPass / http://localhost:3000/
    ProxyPassReverse / http://localhost:3000/

    # Proxy settings for Laravel API (if needed)
    # Only accessible internally from React
    <Location "/api">
        ProxyPass http://localhost:80/api
        ProxyPassReverse http://localhost:80/api
        Require local
    </Location>
</VirtualHost>
```

2. 在React app 中的 package.json 設置代理：
```sh
"proxy": "http://localhost:80.test"
```
