<!--
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 7/8/2556 21:57 น..
 */ 
-->
<div class="row">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
        <li><a href="<?php echo base_url('project'); ?>">ข้อมูลโครงการ</a></li>
        <li class="active">หมวดโครงการ</li>
    </ul>

    <table class="table table-bordered" id="tblMain">
        <thead>
        <tr>
            <th>เลขที่</th>
            <th>หมวดโครงการ</th>
            <th>ตัวย่อ</th>
            <th>รายละเอียด</th>
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
                <h4 class="modal-title">ข้อมูลโครงการ</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboId">เลขที่</label>
                        <input type="text" class="form-control" id="tboId" placeholder="เลขที่" readonly />
                    </div>
                    <div class="col-lg-6">
                        <label class="control-label" for="tboName">หมวดโครงการ</label>
                        <input type="text" class="form-control" id="tboName" placeholder="หมวดโครงการ" />
                    </div>
                    <div class="col-lg-2">
                        <label class="control-label" for="tboShort">อักษรย่อ</label>
                        <input type="text" class="form-control" id="tboShort" placeholder="อักษรย่อ" maxlength="3" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label class="control-label" for="tboDetail">รายละเอียด</label>
                        <textarea class="form-control" id="tboDetail" placeholder="รายละเอียด"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="tboHid" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button id="btnSave" type="button" class="btn btn-primary">บันทึก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="<?php echo base_url('assets/apps/js/setting.project.group.js'); ?>"></script>