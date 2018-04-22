## zdxcms

安装步骤：
- git clone https://github.com/wenhaiqing/zdxcms.git

- cp .env.example .env
  手动创建数据库 修改配置文件的数据库配置
- composer install

- php artisan key:generate

- php artisan migrate --seed

- 给项目文件夹0755权限

- 创建任务调度器export EDITOR=vi && crontab -e

- corn会在每分钟调度一次laravel命令调度器* * * * * php /home/vagrant/Code/xxx/artisan schedule:run >> /dev/null 2>&1

- supervisord -c /etc/supervisord.conf或者supervisorctl reload重启进程管理
