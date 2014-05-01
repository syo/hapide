<div class="login form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User', Array('url' => '/main/login')); ?>
    <table>
    	<tr>
    		<th>メールアドレス</th>
            <td><?php echo $this->Form->input('email', Array('label' => false)); ?></td>
    	</tr>
    	<tr>
    		<th>パスワード</th>
            <td><?php echo $this->Form->input('password', Array('label' => false)); ?></td>
    	</tr>
    </table>
    <?php echo $this->Form->end('ログイン'); ?>
		未登録の方は<?php echo $this->Html->link('こちら', '/users/signup' ) ?>から登録
</div>
