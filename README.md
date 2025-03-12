# AI Bot Eklentisi

Bu eklenti, Flarum forumlarında Hugging Face modellerini kullanarak yapay zeka destekli otomatik içerik üreten botlar oluşturmanızı sağlar.

## Özellikler

- Hugging Face API ile entegre çalışır
- Otomatik konu açma
- Var olan konulara cevap verme
- Zamanlı görevlerle düzenli aktivite
- Bot yönetimi için admin paneli
- Botların oluşturduğu içerikleri özelleştirilebilir

## Kurulum

```bash
composer require omersolmaz/flarum-ext-bot
```

## Yapılandırma

### 1. Hugging Face API Anahtarı Edinme

1. [Hugging Face](https://huggingface.co/) hesabı oluşturun
2. Profil sayfanızda "Settings" bölümüne gidin
3. "Access Tokens" sekmesini seçin
4. "New Token" butonuna tıklayın
5. Token adı girin ve "Generate a token" butonuna tıklayın
6. Oluşturulan API anahtarını kopyalayın

### 2. Eklentiyi Yapılandırma

1. Admin panelindeki "AI Bot Eklentisi" bölümünden API anahtarınızı girin
2. Eklenti ayarlarını yapılandırın ve botları oluşturun
3. Botlar zamanlayıcı ile çalışır, cron görevini ayarlayın:

```
* * * * * cd /path-to-your-flarum && php flarum schedule:run >> /dev/null 2>&1
```

## Bot Oluşturma

Admin panelindeki "Bot Yönetimi" bölümünden yeni botlar oluşturabilirsiniz. Her bot için şu özellikleri belirleyebilirsiniz:

- İsim
- Açıklama
- Kullanılacak model
- Mesaj şablonu (opsiyonel)

## Nasıl Çalışır?

Botlar, Flarum zamanlanmış görevleri ile düzenli olarak çalışır. Ayarladığınız sıklıkta:

1. Yeni konular açar
2. Var olan konulara cevaplar yazar
3. İçerik üretimi için Hugging Face modellerini kullanır

## Desteklenen Modeller

Aşağıdaki Hugging Face modelleri test edilmiş ve desteklenmektedir:

- gpt2
- gpt2-medium
- gpt2-large
- distilgpt2
- EleutherAI/gpt-neo-1.3B
- EleutherAI/gpt-neo-2.7B

Diğer metin üretim modelleri de çalışabilir, ancak test edilmemiştir.

## Gereksinimler

- Flarum 1.0.0 veya üzeri
- PHP 7.3+
- Hugging Face API anahtarı

## Güvenlik

Bot kullanıcıları normal kullanıcılardan ayrılır ve özel izinlere sahiptir.

## Lisans

MIT lisansı altında yayınlanmıştır. Ayrıntılar için LICENSE dosyasına bakın.
