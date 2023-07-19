<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ｜トレース用</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <script src="https://kit.fontawesome.com/23cfeb1953.js" crossorigin="anonymous"></script>
    <link href="css/reset.css" media="screen, projection" rel="stylesheet">
    <link href="css/style.css" media="screen, projection" rel="stylesheet">
</head>
<body>
<?php
		// フォームから送信されたデータを取得して、それぞれの変数に代入
    $user_name = $_POST['user_name'] ?? '';
    $user_kana = $_POST['user_kana'] ?? '';
    $user_email = $_POST['user_email'] ?? '';
    $user_tel = $_POST['user_tel'] ?? '';
    $inquiry_item = $_POST['inquiry_item'] ?? '';
    $inquiry_content = $_POST['inquiry_content'] ?? '';
    $privacy_policy_agreement = $_POST['privacy_policy_agreement'] ?? '';

    // $has_errorという変数を用意し、エラーの有無を管理します（初期値はfalse）
		$required_fields = ['user_name', 'user_kana', 'user_email', 'user_tel', 'inquiry_item', 'inquiry_content'];
		$has_error = false;
		// $error_messagesという空の配列を用意し、エラーメッセージを管理します。
		$error_messages = [];
		
		// 必須項目の配列をループ処理し、各フィールドの値がnullまたはトリム(文字列の先頭と末尾に存在する空白文字（スペース、タブ、改行など）を削除)した結果が空文字列である場合、$has_errorをtrueに設定します。
		foreach ($required_fields as $field) {
				if ($_POST[$field] === null || trim($_POST[$field]) === '') {
						$has_error = true;
				}
		}
    // メールアドレスと電話番号のバリデーション
    if ($user_email !== '' && !filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $has_error = true;
        $error_messages['user_email'] = '正しいメールアドレスを入力してください';
    }

    if ($user_tel !== '' && !preg_match("/^[0-9]{10,11}$/", $user_tel)) {
        $has_error = true;
        $error_messages['user_tel'] = '電話番号は10桁または11桁で入力してください';
    }
?>
<header>
<div class="header">
    <h1>ここには会社名が入ります</h1>
    <div class="heaer_right_box">
        <div class="nav_btn heaer_right">
            <a href="#" class="head_btn01">ボタン01</a>
            <a href="#" class="head_btn02">ボタン02</a>
        </div>
        <div class="nav_btn_sp heaer_right_sp">
            <a href="#" class="head_btn01">01</a>
            <a href="#" class="head_btn02">02</a>
        </div>
    </div>
</div>
<nav class="g-navi">
    <div class="heaer_bottom">
        <a href="#">メニュー01</a>
        <a href="#">メニュー02</a>
        <a href="#">メニュー03</a>
    </div>
</nav>
</header>
<div class="mv">
    <h1><img src="img/mv.png" alt=""></h1>
</div>
<main>
<section class="con_01">
    <div class="wrapper">
        <h1>お問い合わせ</h1>
				<h2>送信完了しました。</h2>
    </div>
</section>
</main>
<footer>
	<section id="foot_01">
					<div class="wrapper">
						<div class="foot_01_box">
			<div class="btn_box">
				<p>こちらからご購入ください</p>
				<a href="#" class="foot_btn_01">ネットショップ</a>
			</div>
			<div class="btn_box">
				<p>お気軽にお問い合わせください</p>
				<a href="#" class="foot_btn_02">お問い合わせ</a>
			</div>
		</div>
	</div>
</section>
</footer>
<section id="foot_02">
	<div class="wrapper">
		<ul>
			<li class="foot_logo">ここには会社名が入ります</li>
			<li>住所が入ります</li>
			<li>03-1234-5678</li>
			<li>営業時間：9:00～18:00</li>
		</ul>
	</div>
</section>
<section id="foot_03">
	<div class=wrapper>
		<div class="foot_03_list">
			<div class="foot_03_link">
				<a href="#">リンク01</a>
			</div>
			<div class="foot_03_link">
				<a href="#">リンク02</a>
			</div>
			<div class="foot_03_link">
				<a href="#">リンク03</a>
			</div>
			<div class="foot_03_link">
				<a href="#">リンク04</a>
			</div>
			<div class="foot_03_link">
				<a href="#">リンク05</a>
			</div>
			<div class="foot_03_link">
				<a href="#">リンク06</a>
				<a href="#">リンク07</a>
			</div>
		</div>
	</div>
</section>
<section id="copyright">
	<div class="wrapper">
		<p>ここには会社名が入ります©Copyright.</p>
	</div>
</section>
</body>
</html>