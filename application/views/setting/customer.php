<!--
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 10/8/2556 12:49 น..
 */
-->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
    <li><a href="<?php echo base_url('project'); ?>">ข้อมูลโครงการ</a></li>
    <li class="active">ข้อมูลลูกค้า</li>
</ul>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">ข้อมูลลูกค้า</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-4">
                <label class="control-label" for="tboName">ชื่อลูกค้า</label>
                <input type="text" class="form-control" id="tboName" placeholder="ชื่อลูกค้า"> <input type="hidden" id="tboId" value="<?php echo $id; ?>">
            </div>
            <div class="col-lg-4">
                <label class="control-label" for="tboAddr">ที่อยู่</label>
                <input class="form-control" type="text" id="tboAddr" placeholder="ที่อยู่">
            </div>
        </div>
        <div class="row">
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
            <div class="col-lg-4">
                <label class="control-label" for="tboTumbon">ตำบล</label>
                <select class="form-control" id="tboTumbon">
                    <option value="">ตำบล</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <label class="control-label" for="tboPost">รหัสไปรษณีย์</label>
                <input type="text" class="form-control" id="tboPost" maxlength="5" placeholder="รหัสไปรษณีย์">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label class="control-label" for="tboPhone">โทรศัพท์</label>
                <input type="text" class="form-control" id="tboPhone" maxlength="50" placeholder="โทรศัพท์">
            </div>
            <div class="col-lg-4">
                <label class="control-label" for="tboFax">โทรสาร</label>
                <input type="text" class="form-control" id="tboFax" maxlength="50" placeholder="โทรสาร">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label class="control-label" for="tboEmail">อีเมล์</label>
                <input type="text" class="form-control" id="tboEmail" maxlength="100" placeholder="อีเมล์">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label class="control-label" for="tboContact">ผู้มาติดต่อ</label>
                <input type="text" class="form-control" id="tboContact" maxlength="100" placeholder="ผู้มาติดต่อ">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-2">
                <button class="btn btn-success" id="btnSave"><i class="icon-save"></i> บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/apps/js/setting.customer.js'); ?>"></script>