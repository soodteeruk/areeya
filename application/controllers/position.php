<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 16/8/2556 22:22 น..
 */ 
class Position extends CI_Controller {
    public $layout_view = 'layout/setting_layout';
    protected $com_id;

    public function __construct() {
        parent::__construct();

        $this->com_id = $this->session->userdata('com_id');
        if(empty($this->com_id))
            redirect(base_url('compeny'));

        $this->load->model('Position_model', 'pos');
    }

    public function index() {
        $this->layout->title('ข้อมูลตำแหน่งงาน');
        $this->layout->view('setting/position');
    }

    public function get_list() {
        $rs = $this->pos->get_list();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        render_json($json);
    }

    public function set_depart() {
        $d = $this->input->post('data');
        $rs = $this->pos->set_depart($d);
        if($rs)
            $json = '{ "success": true, "msg": "บันทึกข้อมูลแล้ว" }';
        else
            $json = '{ "success": false, "msg": "ไม่สามารถบันทึกได้" }';
        render_json($json);
    }

    public function get_depart() {
        $id = $this->input->post('id');
        $rs = $this->pos->get_depart($id);
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';
        render_json($json);
    }

    public function set_remove() {
        $id = $this->input->post('id');
        $rs = $this->pos->set_remove($id);
        if($rs)
            $json = '{ "success": true, "msg": "ลบข้อมูลแล้ว" }';
        else
            $json = '{ "success": false, "msg": "ไม่สามารถลบได้" }';
        render_json($json);
    }
}