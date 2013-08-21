<?php
/**
 * Created by PhpStorm.
 * User: SAIRAT
 * Date: 26/7/2556
 * Time: 0:05 น.
 */
class Compeny extends CI_Controller {
    public $layout_view = 'layout/setting_layout';
    protected $com_id;

    public function __construct() {
        parent::__construct();

        $this->load->model('Compeny_model', 'com');
    }

    public function index()
    {
        $this->layout->title('ข้อมูลบริษัท');
        $this->layout->view('setting/compeny');
    }

    public function get_list() {
        $rs = $this->com->get_list();

        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg":"No data found." }';

        render_json($json);
    }

    public function select() {
        $id = $this->input->post('id');
        $this->session->set_userdata('com_id', $id);

        $json = '{ "session": true, "msg": "เลือกรายการแล้ว" }';
        render_json($json);
    }
}