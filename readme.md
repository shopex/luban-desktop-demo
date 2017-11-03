# Shopex luban-desktop使用说明

luban-desktop是商派在Laravel 5.4的基础上开发的一款现代化的框架，其重构了商派原有ECOS框架的实用功能，可以极大的提高项目开发的效率。

本框架除Laravel原有功能，还包含下面的包:
1. `shopex/luban` -- 负责etcd封装, 后端sevice调用
2. `shopex/luban-admin` --后台desktop样式,包含原有ECOS框架的Finder、typeobject等功能
3. `shopex/luban-crud-generator` 一个可以生curd脚手架
4. `shopex/auth` SSO统一登录, SLO统一登出
## 一、起步
使用Composer创建项目
```
composer create-project shopex/luban-desktop myproj dev-master
```
安装过程中会提示`Do you want to remove the existing VCS (.git, .svn..) history? [Y,n]?`，是否需要删除版本信息，选择`Y`，删除，选择`n`不删除。

`composer create-project`过程成包含以下步骤：
```
git clone https://github.com/shopex/luban-desktop.git myproj
cd myproj
composer install
cp .env.example .env
php artisan optimize
php artisan key:generate
```
## 二、初始化项目
1、将laravel扩展包资源发布到资源目录
```
php artisan vendor:publish
```
运行之后，可以看到如下输出：
```
Copied Directory [/vendor/laravel/framework/src/Illuminate/Notifications/resources/views] To [/resources/views/vendor/notifications]
Copied Directory [/vendor/laravel/framework/src/Illuminate/Pagination/resources/views] To [/resources/views/vendor/pagination]
Copied Directory [/vendor/shopex/luban-admin/publish/Middleware] To [/app/Http/Middleware]
Copied Directory [/vendor/shopex/luban-admin/publish/migrations] To [/database/migrations]
Copied Directory [/vendor/shopex/luban-admin/publish/Model] To [/app]
Copied Directory [/vendor/shopex/luban-admin/publish/Controllers] To [/app/Http/Controllers]
Copied Directory [/vendor/shopex/luban-admin/publish/resources/assets] To [/resources/assets/vendor/admin]
Copied Directory [/vendor/shopex/luban-admin/publish/resources/crud-generator] To [/resources/crud-generator]
Copied Directory [/vendor/shopex/luban-admin/publish/resources/views] To [/resources/views/vendor/admin]
Copied Directory [/vendor/shopex/luban-auth/publish/migrations] To [/database/migrations]
Copied Directory [/vendor/shopex/luban-auth/publish/Model] To [/app]
Copied Directory [/vendor/shopex/luban-auth/publish/Controllers] To [/app/Http/Controllers]
Copied Directory [/vendor/laravel/framework/src/Illuminate/Mail/resources/views] To [/resources/views/vendor/mail]
```
2、安装依赖扩展包：
```
npm install  --registry=https://registry.npm.taobao.org
```
3、编译静态资源
```
// 运行所有 Mix 任务...
npm run dev

// 运行所有 Mix 任务和压缩资源输出
npm run production

```
如果是前端开发可以运行`npm run watch-poll`来监控资源文件修改，自动编译资源
## 三、配置项目
### 1、配置数据库
在`.env`里面配置数据库信息
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
2、创建数据库
```
php artisan migrate
```
3、配置ETCD
如果是微服务架构，则需要配置ETCD的地址，目前本项目在ETCD里面保存了SSO的相关信息：
``` 
ETCD_ADDR=http://192.168.10.96:2379
ETCD_CONFIG_PATH=/luban/config/devops
```
## 四、运行
luban-desktop支持四种方式运行项目代码：
### 1、artisan
php内置Serve
```
php artisan serve
```
### 2、Nginx+php-fpm
此方式需要自行安装lnump
### 3、Swoole
此方式安装php的swoole扩展。
```
//发布配置文件到项目目录
php artisan vendor:publish --provider="Laravoole\LaravooleServiceProvider"
```
运行
```
php artisan laravoole [start | stop | reload | reload_task | restart | quit]
```
### 4、Docker
在本项目根目录下有名为`Dockerfile`的文件，此文件是构建Docker镜像的描述文件，此方式一般用来部署正式环境使用。
 a)、构建镜像：
```
docker build --no-cache -t shopex/luban:desktop .
```
b)、运行容器：
```
docker run -it -d -p 127.0.0.1:9050:9050 --name mydesktop  -e ETCD_ADDR=192.168.10.96:2379 shopex/luban:desktop
```
运行成功之后，可以通过`127.0.0.1:9050`来访问。
c)、登录容器：
```
docker exec -it mydesktop bash
```
