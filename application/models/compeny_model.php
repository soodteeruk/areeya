<?php
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 26/7/2556 18:05 น.
 */
class Compeny_model extends CI_Model {
    public function get_list() {
        $rs = $this->db->get('tb_compeny')->result();

        return $rs;
    }
}