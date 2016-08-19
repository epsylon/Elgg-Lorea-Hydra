<?php
return array(
	'gnusocial_api' => 'Сервисы GNUSocial',

	'gnusocial_api:requires_oauth' => 'Сервисы GNUSocial требуют, чтобы плагин OAuth был включен.',

	'gnusocial_api:consumer_key' => 'Ключ пользователя',
	'gnusocial_api:consumer_secret' => 'Секретная фраза пользователя',

	'gnusocial_api:settings:instructions' => 'Вам необходимо получить ключ пользователя и секретную фразу пользователя от <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>. Заполните карту нового приложения. Выберите Browser как тип приложения и "Чтение и Запись" как тип доступа. Ссылка обратной связи: %sgnusocial_api/authorize',

	'gnusocial_api:usersettings:description' => "Связать ваш аккаунт %s с GNUSocial.",
	'gnusocial_api:usersettings:request' => "Вы должны сначала <a href=\"%s\">авторизировать</a> %s для доступа к вашему GNUSocial аккаунту.",
	'gnusocial_api:usersettings:cannot_revoke' => "Вы не можете отвязать ваш аккаунт от GNUSocial, так как вы не указали email адреса или пароля. <a href=\"%s\">Указать сейчас</a>.",
	'gnusocial_api:authorize:error' => 'Авторизация в GNUSocial не прошла.',
	'gnusocial_api:authorize:success' => 'Доступ к GNUSocial авторизирован.',

	'gnusocial_api:usersettings:authorized' => "Вы авторизировали %s для доступа к вашему GNUSocial аккаунту: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Нажмите <a href="%s">здесь</a> для отмены доступа.',
	'gnusocial_api:usersettings:site_not_configured' => 'Администратор должен настроить GNUSocial перед тем, как вы сможете его использовать.',

	'gnusocial_api:revoke:success' => 'Доступ к GNUSocial был отозван.',

	'gnusocial_api:post_to_gnusocial' => "Отправлять записи микроблога пользователя в GNUSocial?",

	'gnusocial_api:login' => 'Позволять пользователям входить с помощью GNUSocial?',
	'gnusocial_api:new_users' => 'Позволять новым пользователям регистрироваться, используя их Twiiter аккаунт, даже если регистрация пользователей запрещена?',
	'gnusocial_api:login:success' => 'Добро пожаловать!',
	'gnusocial_api:login:error' => 'Не могу войти с помощью GNUSocial.',
	'gnusocial_api:login:email' => "Вы должны ввести корректный email адрес для вашего нового аккаунта %s.",

	'gnusocial_api:invalid_page' => 'Ошибочная страница',

	'gnusocial_api:deprecated_callback_url' => 'Ссылка обратной связи для Твиттера изменилась на %s. Пожалуйста, обратитесь к администратору для ее замены.',

	'gnusocial_api:interstitial:settings' => 'Ваши настройки',
	'gnusocial_api:interstitial:description' => 'Вы практически готовы к использованию %s! Нам необходимо знать несколько деталей прежде, чем продолжить. Они опциональны, но их установка позволит вам залогиниться, если сервет Твиттер упадет или вы решите отвязать ваши аккаунты.',

	'gnusocial_api:interstitial:username' => 'Это ваше имя пользователя. Оно Не может быть изменено. Если вы устанавливаете пароль, вы можете использовать ваше имя пользователя или ваш email для входа.',

	'gnusocial_api:interstitial:name' => 'Это имя, которое будут видеть другие пользователи.',

	'gnusocial_api:interstitial:email' => 'Ваш email адрес. Пользователи по умолчанию его не увидят.',

	'gnusocial_api:interstitial:password' => 'Пароль для логина, если GNUSocial не работает или вы решили отвязать ваш аккаунт.',
	'gnusocial_api:interstitial:password2' => 'Тот же пароль снова.',

	'gnusocial_api:interstitial:no_thanks' => 'Нет, спасибо',

	'gnusocial_api:interstitial:no_display_name' => 'У Вас должно быть отображаемое имя.',
	'gnusocial_api:interstitial:invalid_email' => 'Вы должны указать корректный email адрес или оставьте строку пустой.',
	'gnusocial_api:interstitial:existing_email' => 'Этот email адрес уже зарегистрирован на сайте.',
	'gnusocial_api:interstitial:password_mismatch' => 'Ваши пароли не совпадают.',
	'gnusocial_api:interstitial:cannot_save' => 'Не могу сохранить аккаунт.',
	'gnusocial_api:interstitial:saved' => 'Аккаунт сохранен!',
);
