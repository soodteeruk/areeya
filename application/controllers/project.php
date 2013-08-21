<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 4/8/2556 20:00 น..
 */ 
class Project extends CI_Controller {
    public $layout_view = 'layout/setting_layout';
    protected $com_id;

    public function __construct() {
        parent::__construct();

        $this->com_id = $this->session->userdata('com_id');
        if(empty($this->com_id))
            redirect(base_url('compeny'));

        $this->load->model('Project_model', 'pro');
        $this->load->model('Areeya_model', 'are');
    }

    public function index()
    {
        $this->layout->title('ข้อมูลโครงการ');
        $this->layout->view('setting/project');
    }

    public function group()
    {
        $this->layout->title('ข้อมูลหมวดโครงการ');
        $this->layout->view('setting/project_group');
    }

    public function  get_list() {
        $rs = $this->pro->get_list();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function set_project() {
        $d = $this->input->post('data');

        if($d['opt'] == 'add') {
            $d['id'] = $this->auto_gen_id($d['group']);
        }
        $rs = $this->pro->set_project($d);
        if($rs) {
            $this->are->update_serial('project-'.$d['group'], $d['id']);
            $json = '{ "success": true, "msg": "เพิ่มข้อมูลแล้ว" }';
        } else {
            $json = '{ "success": false, "msg": "การเพิ่มข้อมูลผิดพลาด" }';
        }
        render_json($json);
    }

    public function get_project_detail() {
        $id = $this->input->post('id');
        $rs = $this->pro->get_project_detail($id);
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่พบข้อมูล" }';
        render_json($json);
    }

    public function auto_gen_id($table) {
        $code = $this->pro->get_project_code($table).'-';
        $rs = $this->are->auto_gen_id('project-'.$table);
        if($rs) {
            $res = $rs[0]->at_value;
            $res = ((int)substr($res, 4) + 1);
        } else {
            $res = 1;
        }
        $res = str_format($code, $res, '0000');

        return $res;
    }

    public function get_group_list() {
        $rs = $this->pro->get_group_list();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function get_auto_group_id() {
        $id = date('Y') + 543;
        $id = substr($id, 2);
        $rs = $this->are->auto_gen_id('tb_project_group');
        if($rs) {
            $res = $rs[0]->at_value;
            $res = ((int)substr($res, 4) + 1);
        } else {
            $res = 1;
        }
        $res = str_format($id, $res, '0000');
        $json = '{ "success": true, "id":"'.$res.'" }';
        render_json($json);
    }

    public function get_group_detail() {
        $data = $this->input->post('id');
        $rs = $this->pro->get_group_detail($data);
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function set_project_group() {
        $data = $this->input->post('data');

        $rs = $this->pro->set_project_group($data);
        if($rs) {
            if($data['opt'] == 'add')
                $this->are->update_serial('tb_project_group', $data['id']);
            $json = '{ "success": true, "msg": "บันทึกข้อมูลแล้ว" }';
        } else {
            $json = '{ "success": false, "msg": "การบันทึกข้อมูลผิดพลาด" }';
        }
        render_json($json);
    }

    public function set_group_remove() {
        $data = $this->input->post('id');

        $rs = $this->pro->set_group_remove($data);
        if($rs)
            $json = '{ "success": true, "msg": "ลบข้อมูลแล้ว" }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function get_jungwat() {
        $rs = $this->are->get_jungwat();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function get_amphur() {
        $id = $this->input->post('id');
        $rs = $this->are->get_amphur($id);
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function get_tumbon() {
        $id = $this->input->post('id');
        $rs = $this->are->get_tumbon($id);
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function get_project_status() {
        $rs = $this->pro->get_project_status();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }

    public function get_project_type() {
        $rs = $this->pro->get_project_type();
        if($rs)
            $json = '{ "success": true, "rows": '.json_encode($rs).' }';
        else
            $json = '{ "success": false, "msg": "ไม่มีข้อมูล" }';

        render_json($json);
    }
}