<!--
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 12/8/2556 23:24 น..
 */ 
-->
<div class="row">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
        <li class="active">สถานที่เก็บสินค้า</li>
    </ul>

    <table class="table table-bordered table-hover" id="tblMain">
        <thead>
        <tr>
            <th>เลขที่</th>
            <th>ชื่อสถานที่เก็บ</th>
            <th>ที่อยู่</th>
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
                <h4 class="modal-title">ข้อมูลสถานที่เก็บสินค้า</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboId">เลขที่</label>
                        <input type="text" class="form-control" id="tboId" placeholder="เลขที่" readonly />
                    </div>
                    <div class="col-lg-8">
                        <label class="control-label" for="tboName">สถานที่เก็บสินค้า</label>
                        <input type="text" class="form-control" id="tboName" placeholder="สถานที่เก็บสินค้า" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label class="control-label" for="tboAddr">ที่อยู่</label>
                        <textarea class="form-control" id="tboAddr" placeholder="ที่อยู่"></textarea>
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

<script src="<?php echo base_url('assets/apps/js/setting.store.js'); ?>"></script>