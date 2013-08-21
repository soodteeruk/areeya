<!--
/**
 * Created by Mr.Utit Sairat.
 * E-mail: soodteeruk@gmail.com
 * Date: 26/7/2556 17:32 น.
 */
 -->
<div class="row">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
        <li class="active">ข้อมูลบริษัท</li>
    </ul>

    <table class="table table-bordered" id="tblMain">
        <thead>
        <tr>
            <th>รหัสบริษัท</th>
            <th>ชื่อบริษัท</th>
            <th>วันก่อตั้ง</th>
            <th>โทรศัพท์</th>
            <th>โทรสาร</th>
            <th>อีเมล์</th>
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
                <h4 class="modal-title">ข้อมูลบริษัท</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="tboId">รหัสบริษัท</label>
                        <input type="text" class="form-control" id="tboId" placeholder="รหัสบริษัท" />
                    </div>
                    <div class="col-lg-8">
                        <label class="control-label" for="tboName">ชื่อบริษัท</label>
                        <input type="text" class="form-control" id="tboName" placeholder="ชื่อบริษัท" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label class="control-label">ที่อยู่</label>
                        <input type="text" class="form-control" rows="3" placeholder="ที่อยู่" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label">ตำบล</label>
                        <select class="form-control">
                            <option value="">-- ตำบล --</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label">อำเภอ</label>
                        <select class="form-control">
                            <option value="">-- อำเภอ --</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label">จังหวัด</label>
                        <select class="form-control">
                            <option value="">-- จังหวัด --</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" maxlength="5" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label">โทรศัพท์</label>
                        <input type="text" class="form-control" placeholder="โทรศัพท์" />
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label">โทรสาร</label>
                        <input type="text" class="form-control" placeholder="โทรสาร" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label">รูปแบบบริษัท</label>
                        <select class="form-control">
                            <option value="">-- รูปแบบบริษัท --</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label">ประเภทบริษัท</label>
                        <select class="form-control">
                            <option value="">-- ประเภทบริษัท --</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label">วันก่อตั้ง</label>
                        <input type="text" class="form-control" placeholder="วันก่อตั้ง" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label class="control-label">แผนที่</label>
                        <input type="text" class="form-control" placeholder="แผนที่" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="control-label">โลโก้</label>
                        <img src="#" width="200px" height="200px" class="img-thumbnail" />
                    </div>
                    <div class="col-lg-6">
                        <br>
                            <button class="btn">เลือกภาพ</button>
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
<script src="<?php echo base_url('assets/apps/js/setting.compeny.js'); ?>"></script>