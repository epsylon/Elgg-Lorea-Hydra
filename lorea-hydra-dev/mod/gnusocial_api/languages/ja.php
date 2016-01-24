<?php
return array(
	'gnusocial_api' => 'GNUSocial サービス',

	'gnusocial_api:requires_oauth' => 'GNUSocialサービス機能を使用するには OAuth Libraries plugin が起動されている必要があります',

	'gnusocial_api:consumer_key' => 'Consumer Key',
	'gnusocial_api:consumer_secret' => 'Consumer Secret',

	'gnusocial_api:settings:instructions' => 'consumer key と secret from <a href="https://dev.gnusocial.com/apps/new" target="_blank">GNUSocial</a>が必要です。新しい app アプリケーションを開いてください。アプリケーションタイプとして「Browser」 、アクセスタイプとして「Read & Write」を選択してください。コルバックURLは %sgnusocial_api/authorize です。',

	'gnusocial_api:usersettings:description' => "あなたのアカウント %s とGNUSocialを関連付けします",
	'gnusocial_api:usersettings:request' => "あなたのGNUSocialアカウントにアクセスするには、まず最初に%sを<a href=\"%s\">承認</a> させなければいけません。",
	'gnusocial_api:usersettings:cannot_revoke' => "あなたは、GNUSocialのアカウントとの関連付けを削除することはできません。削除するには電子メールアドレスまたはパスワードをいれてください。<a href=\"%s\">今すぐ作る</a>.",
	'gnusocial_api:authorize:error' => 'GNUSocialの承認が取れまんでした',
	'gnusocial_api:authorize:success' => 'GNUSocialへのアクセスの承認が取れました',

	'gnusocial_api:usersettings:authorized' => "%s で承認が取れました。GNUSocial account: @%s.",
	'gnusocial_api:usersettings:revoke' => 'GNUSocialのアクセスする解除するには<a href="%s">クリック</a>してください。',
	'gnusocial_api:usersettings:site_not_configured' => 'この機能を使用するには、管理者は最初にGNUSocialの設定をセッティング してください。',

	'gnusocial_api:revoke:success' => 'GNUSocial へのアクセスが解除されました',

	'gnusocial_api:post_to_gnusocial' => "GNUSocialにユーザの「つぶやき」記事を送信しますか?",

	'gnusocial_api:login' => 'ユーザにGNUSocialのアカウントでサインインできるようにしますか？',
	'gnusocial_api:new_users' => 'ユーザ登録ができないように設定されていますが、GNUSocialのアカウントを持っている者については、そのアカウントで新規登録できるようにしますか？',
	'gnusocial_api:login:success' => 'あなたは、ログインしています。',
	'gnusocial_api:login:error' => 'GNUSocialでログインできませんでした。',
	'gnusocial_api:login:email' => "新しく %s でアカウントを取るには正しく電子メールアドスが設定されていなくてはいけません。",

	'gnusocial_api:invalid_page' => '不正なページです',

	'gnusocial_api:deprecated_callback_url' => 'コールバックURLがGNUSocial APIを使用するために%sに変更されました。これを変更するには管理者に問い合せてみてください。',

	'gnusocial_api:interstitial:settings' => '設定をする',
	'gnusocial_api:interstitial:description' => '%sを使用する準備がほぼ整いました！ 次に進む前にもう少し詳しい情報を入力してください。しかし、もしGNUSocialがダウンしていたり、あなたが自分のアカウントとGNUSocialへの関連付けをしないようにするのなら、このままログインできます。',

	'gnusocial_api:interstitial:username' => 'これは、あなたのログイン名です。変更することはできません。もし、パスワードを設定したのなら、ログイン名もしくは電子メールアドレスを使用してログインできます。',

	'gnusocial_api:interstitial:name' => 'この名前は、他の人に見えます。あなたはこの名前で他の人と交流することができます。',

	'gnusocial_api:interstitial:email' => 'あなたの電子メールアドレス。でファORTでは他の人は見ることはできません。',

	'gnusocial_api:interstitial:password' => 'ログインパスワード（GNUSocialがダウンしていたり、あなたが自分のアカウントと関連付けない場合に使用します）',
	'gnusocial_api:interstitial:password2' => '確認のためにもう一度同じパスワードを入力してください',

	'gnusocial_api:interstitial:no_thanks' => 'No thanks',

	'gnusocial_api:interstitial:no_display_name' => '氏名を入力してください',
	'gnusocial_api:interstitial:invalid_email' => '正しい電子メールアドレスを入力してください（空欄でも良い）',
	'gnusocial_api:interstitial:existing_email' => 'この電子メールアドレスはすでにこのサイトに登録されています。',
	'gnusocial_api:interstitial:password_mismatch' => 'パスワードが違います。',
	'gnusocial_api:interstitial:cannot_save' => 'アカウントの詳細を細んすることができませんでした。',
	'gnusocial_api:interstitial:saved' => 'アカウントの詳細を保存しました！',
);
