<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 26/7/2556 18:28 น.
 */
class Boq extends CI_Controller {
    public $layout_view = 'layout/setting_layout';
    protected $com_id;

    public function __construct() {
        parent::__construct();

        $this->com_id = $this->session->userdata('com_id');
        if(empty($this->com_id))
            redirect(base_url('compeny'));

        $this->load->model('Boq_model', 'boq');
        $this->load->model('Areeya_model', 'are');
    }

    public function index() {
        $this->layout->title('BOQ');
        $this->layout->view('setting/boq');
    }

    public function group() {
        $this->layout->title('หมวด BOQ');
        $this->layout->view('setting/boq_group');
    }

    public function get_boq_group() {
        $rs = $this->boq->get_boq_group();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function set_boq_group() {
        $data = $this->input->post('data');

        $rs = $this->boq->set_boq_group($data);
        if($rs) {
            $json = '{ "success": true, "msg": "บันทึกข้อมูลแล้ว !" }';
        } else {
            $json = '{ "success": false, "msg": "ไม่สามารถบันทึกข้อมูลได้" }';
        }

        render_json($json);
    }

    public function get_edit_group() {
        $id = $this->input->post('id');
        $rs = $this->boq->get_edit_group($id);
        if($rs) {
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        } else {
            $json = '{ "success": false, "msg": "ไม่พบข้อมูลที่ต้องการแก้ไข" }';
        }

        render_json($json);
    }

    public function set_remove_group() {
        $id = $this->input->post('id');
        $rs = $this->boq->set_remove_group($id);
        if($rs) {
            $json = '{ "success": true, "msg": "ลบข้อมูลแล้ว !" }';
        } else {
            $json = '{ "success": false, "msg": "ไม่สามารถลบข้อมูลได้" }';
        }

        render_json($json);
    }
}