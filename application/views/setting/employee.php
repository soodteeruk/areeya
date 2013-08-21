<!--
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 14/8/2556 19:38 น..
 */
-->
<div class="row">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
        <li class="active">ข้อมูลพนักงาน</li>
        <li><a href="<?php echo base_url('depart'); ?>">ข้อมูลกลุ่มงาน</a></li>
        <li><a href="<?php echo base_url('position'); ?>">ข้อมูลตำแหน่ง</a></li>
    </ul>

    <table class="table table-bordered" id="tblMain">
        <thead>
        <tr>
            <th>รหัส</th>
            <th>ชื่อ - สกุล</th>
            <th>ตำแหน่ง</th>
            <th>โทรศัพท์</th>
            <th>กลุ่มงาน</th>
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
                <h4 class="modal-title">ข้อมูลพนักงาน</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3">
                        <label class="control-label" for="tboId">รหัส</label>
                        <input type="text" class="form-control" id="tboId" placeholder="รหัส" readonly />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboCid">เลขบัตรประชาชน</label>
                        <input type="text" class="form-control" id="tboCid" placeholder="เลขบัตรประชาชน" />
                    </div>
                    <div class="col-lg-5">
                        <label class="control-label" for="tboName">ชื่อ - สกุล</label>
                        <input type="text" class="form-control" id="tboName" placeholder="ชื่อ - สกุล" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboAddr">ที่อยู่</label>
                        <input type="text" class="form-control" id="tboAddr" placeholder="ที่อยู่" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboJungwat">จังหวัด</label>
                        <select class="form-control" id="tboJungwat">
                            <option value="">จังหวัด</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboAmphur">อำเภอ</label>
                        <select class="form-control" id="tboAmphur">
                            <option value="">อำเภอ</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboTumbon">ตำบล</label>
                        <select class="form-control" id="tboTumbon">
                            <option value="">ตำบล</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboPost">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="tboPost" maxlength="5" placeholder="รหัสไปรษณีย์" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboPhone">โทรศัพท์</label>
                        <input type="text" class="form-control" id="tboPhone" placeholder="โทรศัพท์" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboEmail">อีเมล์</label>
                        <input type="text" class="form-control" id="tboEmail" placeholder="อีเมล์" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboSalary">เงินเดือน</label>
                        <input type="text" class="form-control" id="tboSalary" placeholder="เงินเดือน" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboBegin">วันเริ่มงาน</label>
                        <input type="text" data-date-format="yyyy-mm-dd" class="form-control date" id="tboBegin" placeholder="วันเริ่มงาน" readonly />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboStatus">สถานะ</label>
                        <select class="form-control" id="tboStatus">
                            <option value="">สถานะ</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboDepart">กลุ่มงาน</label>
                        <select class="form-control" id="tboDepart">
                            <option value="">กลุ่มงาน</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="tboPosition">ตำแหน่ง</label>
                        <select class="form-control" id="tboPosition">
                            <option value="">ตำแหน่ง</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="tboHid" />
                <button id="btnCancel" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button id="btnSave" type="button" class="btn btn-primary">บันทึก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo base_url('assets/apps/js/setting.employee.js'); ?>"></script>