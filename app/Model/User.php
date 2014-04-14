<?php
class User extends AppModel {
    var $name = 'User';
    var $useTable = 'users';

    public $validate = array(
        'mailaddress' => array(
            // メールアドレスであること。
            'validEmail' => array(
                'rule' => array( 'email', true),
                'message' => 'メールアドレスを入力して下さい'
            ),  
            // 一意性チェック
            'emailExists' => array(
                'rule' => 'isUnique',
                'message' => 'メールアドレスは既に登録されています'
            ),  
        ),  
        'plain' => array(
             // パスワード・確認パスワードの一致
             'match' => array(
                 'rule' => array( 'confirmPassword', 'plain', 'plain_confirm'),
                 'message' => 'パスワードと確認パスワードが一致しません'
             ),  
        )   
    );  

    public function confirmPassword( $field, $plain, $plain_confirm) {


        if ($this->data['User'][$plain] == $this->data['User'][$plain_confirm]) {
          // パスワードハッシュ化
          $this->data['User']['password'] = Security::hash( $this->data['User'][$plain], null, true);
          // $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
          return true;
        }   
    }   

		public function getActivationHash() {
				// ユーザIDの有無確認
				if (!isset($this->id)) {
						return false;
				}
				// 更新日時をハッシュ化
				// return Security::hash( $this->field('modified'), 'md5', true);
				return AuthComponent::password($this->field('modified'));
		}
}
?>
