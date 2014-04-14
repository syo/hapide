<?php 
    echo $this->Session->flash();

    echo $this->Form->create( 'User', array( 'type'=>'post', 'url'=>'signup'));

    // ユーザ名 
    echo $this->Form->input( 'username', array( 'type' => 'text', 'maxlength' => '255', 'label' => 'ユーザ名'));

		// 送信ボタン
    echo $this->Form->input( '登録', array( 'type' => 'submit', 'label' => false));
    echo $this->Form->end();
?>
