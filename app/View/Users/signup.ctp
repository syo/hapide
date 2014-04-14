<?php
    echo $this->Form->create( 'User', array( 'type'=>'post', 'url'=>'signup'));

    // ユーザ名
    echo $this->Form->input( 'username', array( 'type' => 'text', 'maxlength' => '255', 'label' => 'ユーザ名'));

		// メールアドレス
    echo $this->Form->input( 'email', array( 'type' => 'text', 'maxlength' => '255', 'label' => 'メールアドレス'));

    // パスワード
    echo $this->Form->input( 'plain', array( 'maxlength' => '50', 'type' => 'password', 'label' => 'パスワード'));

    // パスワード確認用
    echo $this->Form->input( 'plain_confirm', array( 'maxlength' => '50', 'type' => 'password', 'label' => 'パスワード確認'));

		// 送信ボタン
    echo $this->Form->input( '登録', array( 'type' => 'submit', 'label' => false));
    echo $this->Form->end();
?>
