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
        <p>お問い合わせや業務内容に関するご質問は、電話またはこちらのお問い合わせフォームより承っております。<br>
            後ほど担当者よりご連絡させていただきます。</p>
    </div>
</section>
<section class="con_02">
    <div class="wrapper">
        <div class="contact">
				<form action="task8-1.php" method="POST">
					<!--//フォームに入力エラーがある場合にエラーメッセージをリスト形式で表示するためのHTML要素を生成します。エラーメッセージは赤色で表示され、ユーザーにエラー内容を明示します。 -->
            <?php if ($has_error): ?>
                <div class="error-messages">
                    <ul>
                        <?php foreach ($error_messages as $message): ?>
													<li><p style="color: red;"><?php echo $message; ?></p></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
			<table>
				<tr>
					<!-- $has_errorがtrueの場合、入力フィールドの上に赤色でエラーメッセージが表示されます。入力がない場合、エラーメッセージが表示されます。 -->
					<th>お名前<span>必須</span></th>
					<td>
						<?php if ($user_name === ''): ?>
            <p style="color: red;">お名前を入力してください</p>
						<?php endif; ?>
						<input class="contact-6" type="text" placeholder="山田太郎" name="user_name" value="<?php echo $user_name; ?>">
					</td>
				</tr>
				<tr>
					<th>フリガナ<span>必須</span></th>
					<td>
						<?php if ($user_kana === ''): ?>
            <p style="color: red;">フリガナを入力してください</p>
						<?php endif; ?>
						<input class="contact-6" type="text" placeholder="ヤマダタロウ" name="user_kana" value="<?php echo $user_kana; ?>">
					</td>
				</tr>
				<tr>
					<th>メールアドレス<span>必須</span></th>
					<td>
						<?php if ($user_email === ''): ?>
            <p style="color: red;">メールアドレスを入力してください</p>
						<?php endif; ?>
						<input class="contact-6" type="email" placeholder="info@fast-creademy.jp" name="user_email" value="<?php echo $user_email; ?>">
					</td>
				</tr>
				<tr>
					<th>電話番号<span>必須</span></th>
					<td>
						<?php if ($user_tel === ''): ?>
            <p style="color: red;">電話番号を入力してください</p>
						<?php endif; ?>
						<input class="contact-6" type="tel" placeholder="0123456789" name="user_tel" value="<?php echo $user_tel; ?>">
					</td>
				</tr>
				<tr>
					<th>お問い合わせ項目<span>必須</span></th>
					<td>
						<?php if (empty($inquiry_item)): ?> <!-- 「お問い合わせ項目」が選択されていない場合に条件が成立 -->
        		<p style="color: red;">お問い合わせ項目を選択してください</p>
    				<?php endif; ?>
						<select class="contact-3" name="inquiry_item">
        		<option value="" <?php if ($inquiry_item === '') echo 'selected'; ?>>選択してください</option>
        		<option value="選択1" <?php if ($inquiry_item === '選択1') echo 'selected'; ?>>選択1</option>
        		<option value="選択2" <?php if ($inquiry_item === '選択2') echo 'selected'; ?>>選択2</option>
        		<option value="選択3" <?php if ($inquiry_item === '選択3') echo 'selected'; ?>>選択3</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>お問い合わせ内容<span>必須</span></th>
					<td>
						<?php if ($inquiry_content === ''): ?> <!-- お問い合わせ内容が未入力の場合にエラーメッセージが表示 -->
        		<p style="color: red;">お問い合わせ内容をご記入ください</p>
    				<?php endif; ?>
    				<textarea class="contact-7" placeholder="こちらにお問い合わせ内容をご記入ください" cols="50" rows="10" name="inquiry_content"><?php echo $inquiry_content; ?></textarea>
					</td>
				</tr>
				<tr>
				<th>個人情報保護方針<span>必須</span></th>
				<td>
					<?php if (empty($_POST['privacy_policy_agreement'])): ?><p style="color: red;">個人情報保護方針に同意してください。</p>
						<?php endif; ?>
						<label>
							<input type="checkbox" name="privacy_policy_agreement" <?= !empty($_POST['privacy_policy_agreement']) ? 'checked' : '' ?>>
							<a class="agree" href="null">個人情報保護方針<i class="fas fa-window-restore"></i></a>に同意します。
    				</label>
					</td>
				</tr>
			</table>
		</div>
		<?php if (!$has_error): ?>
			<div class="more_btn_01 btn_center">
				<button type="submit">送信</button>
			</div>
		<?php else: ?>
			<div class="more_btn_01 btn_center">
				<button type="submit">確認</button>
			</div>
		<?php endif; ?>
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