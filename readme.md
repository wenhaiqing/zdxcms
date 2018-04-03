## zdxcms

安装步骤：
- git clone https://github.com/wenhaiqing/zdxcms.git

- cp .env.example .env
  手动创建数据库 修改配置文件的数据库配置
- composer install

- php artisan key:generate

- php artisan migrate --seed
