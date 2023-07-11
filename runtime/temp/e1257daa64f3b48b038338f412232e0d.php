<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"/Users/lambor/Desktop/code/info/app/home/view/index/index.html";i:1688904497;}*/ ?>
<html lang="cn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="__HOME__/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="__HOME__/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script src="__HOME__/js/bootstrap.min.js" type="text/javascript"></script>
<link href="__HOME__/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="__HOME__/css/stylesheet.css" type="text/css" rel="stylesheet">
<link href="__HOME__/css/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet">
<style>
.btn-primary {
    background-image: none;
    background-color: rgb(0, 0, 0);
    color: rgb(255, 255, 255);
    border-color: rgb(255, 255, 255);
}
.focus {
    border: 1px solid #a94442;
}
.layui-layer-dialog .layui-layer-content .layui-layer-ico{
    transform: scale(1.5)!important;
    position: unset!important;
}
.layui-layer-content {
    text-align: center!important;
    padding:20px 20px!important;
}
.layui-layer-btn0{
    background-color: rgb(0, 0, 0)!important;
    color: rgb(255, 255, 255)!important;
    border-color: rgb(255, 255, 255)!important;
    height: 35px!important;
    width: 100px!important;
    line-height: 35px!important;
}
</style>
<title>Top Up Account Balance</title>
<body>
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-9" style="margin-top:30px">
                <div class="tab-content">
                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                        <fieldset>
                            <input type="hidden" name="topup_code" value="topup_bank_transfer">
                            <input type="hidden" name="bank_id" value="">
                            <legend>
                                <span style="float:left; line-height: 35px;">Top Up Account Balance</span>
                                <a href="<?php echo url('index/record'); ?>" style="float: right;" class="btn btn-primary">Check My Top-up Record </a>
                            </legend>
                            <div class="form-group required">
                                <label class="col-sm-3 control-label" for="input-email">My Registered Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" value="" placeholder="My Registered Email" id="input-email" class="form-control">
                                    Can find it in “My Order” > “My Info” 
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-3 control-label" for="input-contact">Contact</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact" value="" placeholder="Contact" id="input-contact" class="form-control" style="height: 50px;">
                                    Please leave your contact infomation,one or more,we prefer "WhatsApp"
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-3 control-label" for="input-pay_to">Pay To</label>
                                <div class="col-sm-9">
                                    <select name="pay_to" id="pay_to" class="form-control">
                                        <option value=""> --- Please Select --- </option>
                                        <option value="PublicBank 6466329711 WongYuHang">PublicBank 6466329711 WongYuHang</option>
                                        <option value="Touch n Go 0126673726 WongYuHang">Touch n Go 0126673726 WongYuHang</option>
                                        <option value="DuitNow 180489609731 WongYuHang">DuitNow 180489609731 WongYuHang</option>
                                        <option value="Paypal @yydspersonal">Paypal @yydspersonal</option>
                                        <option value="Cryptocurrency">Cryptocurrency</option>
                                    </select>
                                    <div class="img-bank"></div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-3 control-label" for="input-account_name">My Bank Account Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="account_name" value="" placeholder="My Bank Account Name" id="input-account_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-3 control-label" for="input-account_no">My Bank Account No.</label>
                                <div class="col-sm-9">
                                    <input type="text" name="account_no" value="" placeholder="My Bank Account No." id="input-account_no" class="form-control">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-3 control-label" for="input-reference_number">Reference Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="reference_number" value="" placeholder="Reference Number" id="input-reference_number" class="form-control">
                                    <input type="hidden" name="reference_number_required" value="0">
                                </div>
                            </div>
                            
                            
                            <div class="form-group required">
                                <label class="col-sm-3 control-label" for="input-amount">Amount <b><span id="min_amount"></span></b> </label>
                                <div class="col-sm-5">
                                    <div class="input-group" id="input-group_amount"><span id="bank_currency" class="input-group-addon">RM</span>
                                        <input type="text" name="amount" value="" placeholder="Amount" id="input-amount" class="form-control" autocomplete="off">
                                    </div>
                                    Amount converted <span id="base_currency_amount"> 0 </span> Points 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="input-remark">Add Remark About Your Top-up</label>
                                <div class="col-sm-9">
                                    <textarea name="remark" rows="8" style="width: 100%;" placeholder="Add Remark About Your Top-up" id="remark"></textarea>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-3 control-label" for="input-date-paid">Date Paid</label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="input-group_date">
                                        <input type="text" name="date_paid" value="" placeholder="Date Paid" id="input-date_paid" data-date-format="YYYY-MM-DD" class="form-control" readonly>
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" id="date"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-3 control-label" for="input-file">Receipt</label>
                                <div class="col-sm-9">
                                    <button type="button" id="button-upload" data-loading-text="Loading..." class="btn btn-default btn-block"><i class="fa fa-upload"></i> Upload Receipt</button>
                                    <input type="hidden" name="file" value="" id="file">
                                    <input type="hidden" name="receipt_required" value="1">
                                </div>
                        
                            </div>
                        </fieldset>
                        <div class="buttons clearfix">
                            <div class="pull-left"><a href="javascript:history.go(-1);" class="btn btn-default">Back</a></div>
                            <div class="pull-right">
                                <input type="button" id="button-confirm" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="__HOME__/js/moment.js" type="text/javascript"></script>
<script src="__HOME__/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="__HOME__/js/layer/layer.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#input-amount').on("input", function(){
        $('#base_currency_amount').html($(this).val())
    })
    $('.date').datetimepicker({
        pickTime: false
    });

    $('.datetime').datetimepicker({
        pickDate: true,
        pickTime: true
    });

    $('.time').datetimepicker({
        pickDate: false
    });
    $('#input-date_paid').click(function(){
        $('#date').click();
    })
    function tips(node, text){
        $(node).addClass("focus")
        $(node).parent().append('<div class="text-danger">' + text + '</div>');
    }
    function tipsRemove(node) {
        $(node).removeClass("focus")
        $('.text-danger').remove();
    }
    $('#button-confirm').click(function(){
        
        var email = $('#input-email').val();
        var contact = $('#input-contact').val();
        var pay_to = $('#pay_to').val();
        var account_name = $('#input-account_name').val();
        var account_no = $('#input-account_no').val();
        var reference_number = $('#input-reference_number').val();
        var amount = $('#input-amount').val();
        var remark = $('#remark').val();
        var pay_date = $('#input-date_paid').val();
        var file = $('#file').val();
        if (email == '') {
            tips($('#input-email'), 'Registered Email must be filled!')
            return false
        } else {
            tipsRemove($('#input-email'))
        }
        if (contact == '') {
            tips($('#input-contact'), 'Contact must be filled!')
            return false
        } else {
            tipsRemove($('#input-contact'))
        }
        if (pay_to == '') {
            tips($('#pay_to'), 'Where the amount paid to must be selected!')
            return false
        } else {
            tipsRemove($('#pay_to'))
        }
        if (account_name == '') {
            tips($('#input-account_name'), 'Bank Account Name must be filled!')
            return false
        } else {
            tipsRemove($('#input-account_name'))
        }
        if (account_no == '') {
            tips($('#input-account_no'), 'Bank Account No. must be filled!')
            return false
        } else {
            tipsRemove($('#input-account_no'))
        }
        if (amount == '') {
            tips($('#input-group_amount'), 'Amount must not be empty!')
            return false
        } else {
            tipsRemove($('#input-group_amount'))
        }
        if (pay_date == '') {
            tips($('#input-group_date'), 'Where the Date Paid must be selected!')
            return false
        } else {
            tipsRemove($('#input-group_date'))
        }
        if (file == '') {
            tips($('#file'), 'Receipt not uploaded!')
            return false
        } else {
            tipsRemove($('#file'))
        }
        $.ajax({
            url: "<?php echo url('index/index'); ?>",
            type: 'post',
            dataType: 'json',
            data: {
                'email' : email,
                'contact' :contact,
                'pay_to' : pay_to,
                'account_name' : account_name,
                'account_no' : account_no,
                'reference_number' : reference_number,
                'amount' : amount,
                'remark' : remark,
                'pay_date' : pay_date,
                'file' : file
            },
            success: function(res) {
                if(res.code) {
                    layer.alert('', 
                        {   
                            icon: 1,
                            title:false,
                            btn:['Confirm'],
                            btnAlign: 'c',
                            area: ['500px','300px'],
                            closeBtn: 0,
                            content: '<h1>Submit Completed</h1><p>Contact Us for faster verify! </p><p>We will contact you if we find any incorrect issue / incorrect information you provided.</p>'
                        },function(index){
                            layer.close(index);
                            setTimeout(function(){
                                window.location.reload();
                            },500)
                        }
                    );
                } else {
                    layer.msg(res.msg)
                }
            }
        });

    })
</script>
<script type="text/javascript"><!--
    $('button[id^=\'button-upload\']').on('click', function() {
        var node = this;

        $('#form-upload').remove();

        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" accept="image/*"/></form>');

        $('#form-upload input[name=\'file\']').trigger('click');

        if(typeof timer !='undefined'){
            clearInterval(timer);
        }

        timer = setInterval(function() {
            if ($('#form-upload input[name=\'file\']').val() != '') {
                clearInterval(timer);
                $.ajax({
                    url: "<?php echo url('index/upload'); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: new FormData($('#form-upload')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $(node).button('loading');

                    },
                    complete: function() {
                        $(node).button('reset');

                    },
                    success: function(json) {
                        $('.text-danger').remove();
                        console.log(json)
                        if (json.code == 0) {
                            $(node).parent().find('input:first').after('<div class="text-danger">' + json.info + '</div>');

                        }

                        if (json.code) {
                            //alert('Receipt uploaded, please submit your top-up');
                            $('.container-upload-success').hide();
                            $(node).parent().find('button').after('<b class="container-upload-success">Receipt uploaded, please submit your top-up</b>');
                            $(node).parent().find('input[name=file]').attr('value', json.url);
                            $(node).parent().find('button').parent().find('img').hide();
                            if (json.url) {
                                $(node).parent().find('button').after('<img src="' + json.url + '" width="40" style="margin:2px; display: block"/>');
                            }
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        $(node).parent().find('input:first').after('<div class="text-danger">' + thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText + '</div>');

                    }
                });
            }
        }, 500);
    });
//--></script>
</html>