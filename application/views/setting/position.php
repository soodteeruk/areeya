<!--
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 16/8/2556 22:24 น..
 */ 
-->
<div class="row">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
        <li><a href="<?php echo base_url('employee'); ?>">ข้อมูลพนักงาน</a></li>
        <li><a href="<?php echo base_url('depart'); ?>">ข้อมูลกลุ่มงาน</a></li>
        <li class="active">ข้อมูลตำแหน่ง</li>
    </ul>

    <table class="table table-bordered" id="tblMain">
        <thead>
        <tr>
            <th>รหัส</th>
            <th>ชื่อตำแหน่ง</th>
            <th>#<button class="btn btn-sm pull-right btn-success" id="btnAdd"><i class="icon-plus"></i></button></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="mdlMain">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">ข้อมูลตำแหน่งงาน</h4>
            </div>
            <div class="modal-body">
                <p>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" id="tboId">
                        <label class="control-label" for="tboName">ชื่อตำแหน่ง</label>
                        <input type="text" class="form-control" id="tboName" placeholder="ชื่อกลุ่มงาน">
                    </div>
                </div>
                </p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="tboHid">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button type="button" id="btnSave" class="btn btn-primary">บันทึก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo base_url('assets/apps/js/setting.position.js'); ?>" type="text/javascript"></script>