# iAdmin后台管理系统

基于`Laravel5.2`的后台管理系统，实现最基本的后台框架：权限、角色、菜单、用户、日志功能，后台主题是用的[metronic主题](http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes)，本人代码完全开源，至于主题只供学习交流。如需商业应用请自行购买授权！

![iadmin](http://cache.iwanli.me/iwanli/imageiadmin.png)

## 安装

> 我习惯把缓存用 Redis 来存储，如果有朋友不想安装 Reids ，请将项目安装时 .env 文件中的 CACHE_DRIVER=file 默认配置即可。

安装本项目跟普通安装一样

1. 下载本项目,然后在项目根目录执行 `composer install`
2. 包安装完成后,复制.env.example 文件为.env
3. 执行 `php artisan key:generate`
4. 迁移数据: `php artisan migrate`  And `php artisan db:seed`

OK,项目已经配置完成，后台地址：example.com/admin，不清楚的可以直接去看 `routes.php` 文件。默认管理员账号：`admin@admin.com` , 密码：`123456` 
如果你是在Linux或Mac下配置的请注意相关目录的权限，这里我就不多说了，enjoy！

## 验证码一直错误问题

如果你的验证码包(mews/captcha)版本是`2.12`,但是登录后台的时候一直出现验证码错误，请在 `vendor\mews\captcha\src\CaptchaServiceProvider.php` 中添加一下代码：

```php
// HTTP routing
if (strpos($this->app->version(), 'Lumen') !== false) {
    //Laravel Lumen
    $this->app->get('captcha[/{config}]', 'Mews\Captcha\LumenCaptchaController@getCaptcha');
} else if (starts_with($this->app->version(), '5.2.') !== false) {
    //Laravel 5.2.x
    $this->app['router']->get('captcha/{config?}', '\Mews\Captcha\CaptchaController@getCaptcha')->middleware('web');
} else {
    //Laravel 5.0.x ~ 5.1.x
    $this->app['router']->get('captcha/{config?}', '\Mews\Captcha\CaptchaController@getCaptcha');
}
```

将文件中对应的代码替换掉就可以正常登录了，github上的代码已经是修复了这个Laravel5.2的bug，但是用composer下载的时候代码却没有更新，所以只好现在手动加上去了，等作者更新一个版本后估计就没有这个问题了。

如有什么错误的地方，请指点，非常感谢！也可以直接联系我：709344897@qq.com 。基于这个后台的博客项目：[i晚黎](http://www.iwanli.me)