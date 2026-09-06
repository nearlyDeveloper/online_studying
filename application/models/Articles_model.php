<?php
class articles_model extends MY_Model {
	protected $table_name = 'articles';
	protected $order_by = 'id asc';
	public $rules = [];
}
?>