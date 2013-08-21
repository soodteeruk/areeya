<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 14/8/2556 19:37 น..
 */ 
class Employee_model extends CI_Model {
    public $com_id;

    public function get_list() {
        $this->db->select('*');
        $this->db->from('tb_employee');
        $this->db->join('tb_department', 'tb_employee.dep_id=tb_department.dep_id', 'left');
        $this->db->join('tb_position', 'tb_employee.pos_id=tb_position.pos_id', 'left');
        $rs = $this->db->get()->result();

        return $rs;
    }

    public function set_employee($d) {
        if($d['opt'] == 'add') {
            $rs = $this->db
                ->insert('tb_employee', array(
                    'emp_id'        => $d['id'],
                    'emp_cid'       => $d['cid'],
                    'emp_name'      => $d['name'],
                    'emp_addr'      => $d['addr'],
                    'emp_tumbon'    => $d['tumbon'],
                    'emp_amphur'    => $d['amphur'],
                    'emp_jungwat'   => $d['jungwat'],
                    'emp_post'      => $d['post'],
                    'emp_phone'     => $d['phone'],
                    'emp_email'     => $d['email'],
                    'emp_salary'    => $d['salary'],
                    'emp_begin'     => $d['begin'],
                    'ems_id'        => $d['status'],
                    'dep_id'        => $d['depart'],
                    'pos_id'        => $d['position'],
                    'com_id'        => $this->com_id
                ));
        } else {
            $rs = $this->db
                ->where('emp_id', $d['id'])
                ->update('tb_employee', array(
                    'emp_cid'       => $d['cid'],
                    'emp_name'      => $d['name'],
                    'emp_addr'      => $d['addr'],
                    'emp_tumbon'    => $d['tumbon'],
                    'emp_amphur'    => $d['amphur'],
                    'emp_jungwat'   => $d['jungwat'],
                    'emp_post'      => $d['post'],
                    'emp_phone'     => $d['phone'],
                    'emp_email'     => $d['email'],
                    'emp_salary'    => $d['salary'],
                    'emp_begin'     => $d['begin'],
                    'ems_id'        => $d['status'],
                    'dep_id'        => $d['depart'],
                    'pos_id'        => $d['position'],
                ));
        }
        return $rs;
    }

    public function get_status() {
        $rs = $this->db
            ->get('tb_employee_status')
            ->result();
        return $rs;
    }
}