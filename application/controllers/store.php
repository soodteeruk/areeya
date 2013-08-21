<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 12/8/2556 23:21 น..
 */ 
class Store extends CI_Controller {
    public $layout_view = 'layout/setting_layout';
    protected $com_id;

    public function __construct() {
        parent::__construct();

        $this->com_id = $this->session->userdata('com_id');
        if(empty($this->com_id))
            redirect(base_url('compeny'));

        $this->load->model('Store_model', 'store');
    }

    public function index() {
        $this->layout->title('สถานที่เก็บสินค้า');
        $this->layout->view('setting/store');
    }

    public function get_list() {
        $this->store->com_id = $this->com_id;
        $rs = $this->store->get_list();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function set_store() {
        $d = $this->input->post('data');
        $this->store->com_id = $this->com_id;
        $rs = $this->store->set_store($d);
        if($rs)
            $json = '{ "success": true, "msg": "บันทึกข้อมูลแล้ว" }';
        else
            $json = '{ "success": false, "msg": "พบข้อผิดพลาดในการบันทึกข้อมูล" }';

        render_json($json);
    }

    public function get_store_detail() {
        $id = $this->input->post('id');
        $rs = $this->store->get_store_detail($id);
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function set_store_remove() {
        $id = $this->input->post('id');
        $rs = $this->store->set_store_remove($id);
        if($rs)
            $json = '{ "success": true, "msg": "ลบข้อมูลแล้ว" }';
        else
            $json = '{ "success": false, "msg": "พบข้อผิดพลาด" }';

        render_json($json);
    }
}