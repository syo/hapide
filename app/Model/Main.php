<?php
class User extends AppModel {
    var $name = 'Main';
    var $useTable = 'cake_php';

    public function confirmPassword( $field, $plain, $plain_confirm) {


        if ($this->data['User'][$plain] == $this->data['User'][$plain_confirm]) {
          // パスワードハッシュ化
          $this->data['User']['password'] = Security::hash( $this->data['User'][$plain], 'sha512', true);
          return true;
        }   
    }   

		public function getActivationHash() {
				// ユーザIDの有無確認
				if (!isset($this->id)) {
						return false;
				}
				// 更新日時をハッシュ化
				return Security::hash( $this->field('modified'), 'md5', true);
		}
}
?>
