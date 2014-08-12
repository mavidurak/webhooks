# Mavidurak GitHub-Twitter Synchroniser

Bu uygulama Mavidurak organizasyonunda bulunan repository'lerde push yapıldığında Twitter hesabına bilgilendirme yapar. Siz de Mavidurak içerisinde geliştirdiğiniz kendi reponuzu bu kuyruğa eklemek isterseniz aşağıdaki adımları takip edebilirsiniz.

### Webhook Tanımlaması

* GitHub üzerinde reponuzun ana sayfasından `Settings` bölümüne gidiniz.
* Sol tarafta bulunan `Webhooks & Services` seçeneğini seçiniz.
* `Add Webhook` butonuna tıklayınız.
* `Payload URL` bölümüne: `http://neyapiyorlar.com/mavidurak/webhooks/push` URL adresini yazınız.
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
