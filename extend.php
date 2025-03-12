<?php

/*
 * AI Bot Eklentisi için Flarum extend konfigürasyonu
 */

use Flarum\Extend;
use OmerSolmaz\BotExtension\Api\Controllers;
use OmerSolmaz\BotExtension\Console\BotScheduleCommand;
use OmerSolmaz\BotExtension\BotServiceProvider;
use OmerSolmaz\BotExtension\User\BotUser;
use OmerSolmaz\BotExtension\Forum\AddBotTypes;
use Flarum\Api\Serializer\UserSerializer;
use Flarum\User\User;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),
    
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/less/admin.less'),
    
    new Extend\Locales(__DIR__.'/locale'),
    
    (new Extend\ServiceProvider())
        ->register(BotServiceProvider::class),
    
    // Veri tabanı migrations için
    (new Extend\Migrations())->path(__DIR__.'/migrations'),
    
    // Bot işlemlerini konsol komutu olarak ekliyoruz
    (new Extend\Console())
        ->command(BotScheduleCommand::class),
    
    // Bot API Kontrolcüleri
    (new Extend\Routes('api'))
        ->post('/bots/create', 'bots.create', Controllers\CreateBotController::class)
        ->get('/bots', 'bots.index', Controllers\ListBotsController::class)
        ->delete('/bots/{id}', 'bots.delete', Controllers\DeleteBotController::class)
        ->patch('/bots/{id}', 'bots.update', Controllers\UpdateBotController::class)
        ->post('/bot-action', 'bots.action', Controllers\RunBotActionController::class),
        
    // Bot kullanıcıları için özel işlemler
    (new Extend\Event())
        ->subscribe(BotUser::class),
        
    // Bot kullanıcı tipini API çıktısına ekle
    (new Extend\ApiSerializer(UserSerializer::class))
        ->attributes(AddBotTypes::class),
        
    // Kullanıcı sütununa isBot alanı ekle
    (new Extend\Model(User::class))
        ->cast('isBot', 'boolean')
];
