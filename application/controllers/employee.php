<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 14/8/2556 19:13 น..
 */ 
class Employee extends CI_Controller {
    public $layout_view = 'layout/setting_layout';
    protected $com_id;

    public function __construct() {
        parent::__construct();

        $this->com_id = $this->session->userdata('com_id');
        if(empty($this->com_id))
            redirect(base_url('compeny'));

        $this->load->model('Employee_model', 'emp');
        $this->load->model('Areeya_model', 'are');
    }

    public function index() {
        $this->layout->title('ข้อมูลพนักงาน');
        $this->layout->view('setting/employee');
    }

    public function get_auto_id() {
        $code = (date('Y') + 543);
        $code = substr($code, 2).date('m');
        $rs = $this->are->auto_gen_id('tb_employee');
        if($rs) {
            $res = $rs[0]->at_value;
            $res = ((int)substr($res, 4) + 1);
        } else {
            $res = 1;
        }
        $res = str_format($code, $res, '00000');

        $json = '{ "success": true, "rows": '.$res.' }';
        render_json($json);
    }

    public function get_list() {
        $this->emp->com_id = $this->com_id;

        $rs = $this->emp->get_list();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        render_json($json);
    }

    public function set_employee() {
        $this->emp->com_id = $this->com_id;

        $d = $this->input->post('data');
        $rs = $this->emp->set_employee($d);
        if($rs) {
            $this->are->update_serial('tb_employee', $d['id']);
            $json = '{ "success": true, "msg": "บันทึกข้อมูลแล้ว" }';
        } else {
            $json = '{ "success": false, "msg": "ไม่สามารถบันทึกข้อมูลได้" }';
        }
        render_json($json);
    }

    public function get_status() {
        $rs = $this->emp->get_status();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        render_json($json);
    }
}