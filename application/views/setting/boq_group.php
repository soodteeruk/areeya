<!--
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 26/7/2556 18:24 น.
 */ -->
<div class="row">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
        <li><a href="<?php echo base_url('boq'); ?>">BOQ</a></li>
        <li class="active">หมวด BOQ</li>
    </ul>

    <table class="table table-bordered table-hover" id="tblMain">
        <thead>
        <tr>
            <th>รหัส BOQ</th>
            <th>ชื่อ BOQ</th>
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
                <h4 class="modal-title">หมวด BOQ</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboId">รหัส BOQ</label>
                        <input type="text" class="form-control" id="tboId" placeholder="รหัส BOQ" />
                    </div>
                    <div class="col-lg-8">
                        <label class="control-label" for="tboName">ชื่อหมวด BOQ</label>
                        <input type="text" class="form-control" id="tboName" placeholder="ชื่อหมวด BOQ" />
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

<script src="<?php echo base_url('assets/apps/js/setting.boq.group.js'); ?>"></script>