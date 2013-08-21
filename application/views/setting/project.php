<!--
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 4/8/2556 20:03 น..
 */ 
-->
<div class="row">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
        <li class="active">ข้อมูลโครงการ</li>
        <li><a href="<?php echo base_url('project/group'); ?>">หมวดโครงการ</a></li>
    </ul>

    <table class="table table-bordered" id="tblMain">
        <thead>
        <tr>
            <th>เลขที่</th>
            <th>โครงการ</th>
            <th>มูลค่าสัญญา</th>
            <th>เริ่มสร้าง</th>
            <th>กำหนดเสร็จ</th>
            <th>สถานะ</th>
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
                    <div class="col-lg-8">
                        <label class="control-label" for="tboName">ชื่อโครงการ</label>
                        <input type="text" class="form-control" id="tboName" placeholder="ชื่อโครงการ" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="control-label" for="tboProType">ประเภทโครงการ</label>
                        <select class="form-control" id="tboProType">
                            <option value="">-- ประเภทโครงการ --</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="control-label" for="tboProStatus">สถานะโครงการ</label>
                        <select class="form-control" id="tboProStatus">
                            <option value="">-- สถานะโครงการ --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboLocal">ที่ตั้ง</label>
                        <input type="text" class="form-control" id="tboLocal" placeholder="ที่ตั้ง" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboJungwat">จังหวัด</label>
                        <select class="form-control" id="tboJungwat">
                            <option value="">-- จังหวัด --</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboPrice">มูลค่าสัญญาไม่รวม VAT</label>
                        <input id="tboPrice" type="text" class="form-control" placeholder="มูลค่าสัญญาไม่รวม VAT" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboVat">VAT</label>
                        <input type="text" class="form-control" placeholder="VAT" id="tboVat" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboBegin">วันเริ่ม</label>
                            <input type="text" data-date-format="yyyy-mm-dd" class="form-control date" id="tboBegin" readonly placeholder="วันเริ่ม" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboFinish">กำหนดเสร็จ</label>
                        <input type="text" data-date-format="yyyy-mm-dd" class="form-control date" id="tboFinish" readonly placeholder="กำหนดเสร็จ" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboDays">จำนวนวัน</label>
                        <input type="text" class="form-control" id="tboDays" placeholder="จำนวนวัน" readonly />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboCompeny">บริษัท</label>
                        <select class="form-control" id="tboCompeny">
                            <option value="">-- บริษัท --</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboProGroup">หมวดโครงการ</label>
                        <select class="form-control" id="tboProGroup">
                            <option value="">-- หมวดโครงการ --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label class="control-label" for="tboCmt">หมายเหตุ</label>
                        <textarea class="form-control" id="tboCmt" placeholder="หมายเหตุ"></textarea>
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
<script src="<?php echo base_url('assets/apps/js/setting.project.js'); ?>"></script>