<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 10/8/2556 12:47 น..
 */ 
class Customer extends CI_Controller {
    public $layout_view = 'layout/setting_layout';
    protected $com_id;

    public function __construct() {
        parent::__construct();

        $this->com_id = $this->session->userdata('com_id');
        if(empty($this->com_id))
            redirect(base_url('compeny'));

        $this->load->model('Customer_model', 'cus');
    }

    public function index()
    {
        redirect(base_url('project'));
    }

    public function update($id) {
        $data['id'] = $id;
        $this->layout->title('ข้อมูลลูกค้า - '.$id);
        $this->layout->view('setting/customer', $data);
    }

    public function get_list() {
        $id = $this->input->post('id');
        $rs = $this->cus->get_list($id);
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        render_json($json);
    }

    public function set_customer() {
        $d = $this->input->post('data');
        $rs = $this->cus->set_customer($d);
        if($rs)
            $json = '{ "success": true, "msg": "บันทึกข้อมูลแล้ว" }';
        else
            $json = '{ "success": false, "msg": "บันทึกข้อมูลผิดพลาด !" }';
        render_json($json);
    }
}