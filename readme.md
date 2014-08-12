# Mavidurak Webhooks

Bu uygulama Mavidurak organizasyonunda bulunan repolar için geliştirilmiştir. GitHub'ın sağladığı webhookslardan yararlanarak çeşitli işlemler yapılmasını amaçlamaktadır. 

### Kullanılabilir Bağlantılar

* `push`: Push işleminde `@mavidurakio` Twitter hesabından bilgilendirme tweeti gönderilir. 
```
http://neyapiyorlar.com/mavidurak/webhooks/push
```
 
### Webhook Tanımlaması

* GitHub üzerinde reponuzun ana sayfasından `Settings` bölümüne gidiniz.
* Sol tarafta bulunan `Webhooks & Services` seçeneğini seçiniz.
* `Add Webhook` butonuna tıklayınız.
* `Payload URL` bölümüne ilgili URL adresini yazınız.
* Content Type bölümünü `application/json` olarak seçiniz.
* `Add Webhook` butonuna tıklayarak tanımlamayı kaydediniz.

### Twitter Hesabınızın Tanımlaması

`app/config/api.php` dosyası içerisindeki `users` dizisi içerisine aşağıdaki gibi kendi Twitter hesabınızın tanımlamasını yapınız;

```php 
'users' => array(
	'your_github_username' => array(
		'twitter' => 'your_twitter_account'
	),
)
```

Hesabınızı tanımladıktan sonra `pull-request` göndererek değişikliklerin aktif olmasını talep ediniz.

### Lisans

[MIT license](http://opensource.org/licenses/MIT)
