<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<div class="row">
		<div class="col-sm">
			<img src="/skans/<?php echo $_GET['file'];?>" alt="<?php echo $_GET['file'];?>" width="500" height="500"/>
		</div>
		<div class="col-sm">
			<form class="form-horizontal" id="check_otpravki_reg">
		        <div class="row">
		            <div class="col-md-3"></div>
		            <div class="col-md-6">
		                <h2>Registraciya Checka</h2>
		                <hr>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-3 field-label-responsive">
		                <label for="nomer_cheka">nomer_cheka</label>
		                <input type="hidden" name="action" value="checkotpravki_<?php echo $_GET['file'];?>">
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                      <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
		                      <input type="text" name="nomer_cheka" class="form-control" id="nomer_cheka" value="<?php echo ($chek_otpravki['status']==1?$chek_otpravki['data'][0]['nomer_cheka']:'');?>" required autofocus>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-3 field-label-responsive">
		                <label for="data_otpravki">data_otpravki</label>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
		                        <input type="date" name="data_otpravki" class="form-control" id="data_otpravki"
		                               placeholder="Data otpravki"  value="<?php echo ($chek_otpravki['status']==1?$chek_otpravki['data'][0]['data_otpravki']:'');?>" required autofocus>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-3 field-label-responsive">
		                <label for="nomer_otslejivanie">nomer_otslejivanie</label>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
		                        <input type="number" name="nomer_otslejivanie" class="form-control" id="nomer_otslejivanie"
		                               placeholder="nomer_otslejivanie"  value="<?php echo ($chek_otpravki['status']==1?$chek_otpravki['data'][0]['nomer_otslejivanie']:'');?>" required>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-3 field-label-responsive">
		                <label for="status">status</label>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem">
		                            <i class="fa fa-repeat"></i>
		                        </div>
		                        <select name="status" class="form-control"
		                               id="status" placeholder="Password" required>
<?php foreach(['новый','внесенный','ошибочный'] as $row ):?>
		                        	<option value="<?php echo $row;?>" <?php echo ($chek_otpravki['status']==1?($chek_otpravki['data'][0]['status']==$row?'selected':''):'');?>><?php echo $row;?></option>
<?php endforeach;?>
		                        </select>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-6">
		                <button type="submit" class="btn btn-success">Save</button>
		            </div>
		            <div class="col-md-3" id="notify"></div>
		        </div>
		    </form>
		</div>
	</div>
	<div class="row">
	<div class="col-sm-4">
		Filter Podpischiki :
		<input id="podpischik_search" name="podpischik_search" size="40" />
		<table id="podpischik" class="table table-bordered">
		    <thead>
		        <th>FIO</th>
		        <th>Adres</th>
		    </thead>
		    <tbody id="podpischik_body">
<?php foreach($podpischik as $row ):?>
		        <tr>
		            <td><?php echo $row['fio'];?></td>
		            <td><?php echo $row['adres'];?></td>
		            <td><button class="btn btn-sm btn-success" onclick="relate(this,'<?php echo $row['id'];?>','podpischik','<?php echo $chek_otpravki['data'][0]['id'];?>')" 
		            	<?php echo ($chek_otpravki['status']==1?($row['id']==$chek_otpravki['data'][0]['podpischik']?'disabled':''):'');?>>Privyazka</button></td>
		        </tr>
<?php endforeach;?>
		    </tbody>
		</table>
	</div>
	<div class="col-sm-4">
		Filter podpiska :
		<input id="podpiska_search" name="podpiska_search" size="40" />
		<table id="podpiska" class="table table-bordered">
		    <thead>
		        <th>data_nachala</th>
		        <th>srok</th>
		    </thead>
		    <tbody id="podpiska_body">
<?php foreach($podpiska as $row ):?>
		        <tr>
		            <td><?php echo $row['data_nachala'];?></td>
		            <td><?php echo $row['srok'];?></td>
		            <td><button class="btn btn-sm btn-success" onclick="relate(this,'<?php echo $row['id'];?>','podpiska','<?php echo $chek_otpravki['data'][0]['id'];?>')" 
		            	<?php echo ($chek_otpravki['status']==1?($row['id']==$chek_otpravki['data'][0]['podpiska']?'disabled':''):'');?>>Privyazka</button></td>
		        </tr>
<?php endforeach;?>
		    </tbody>
		</table>
	</div>
	<div class="col-sm-4">
		Filter Jurnal :
		<input id="jurnal_search" name="jurnal_search" size="40" />
		<table id="jurnal" class="table table-bordered">
		    <thead>
		        <th>nazvanie</th>
		        <th>nomer_jurnala</th>
		        <th>data_vixoda</th>
		    </thead>
		    <tbody id="jurnal_body">
<?php foreach($jurnal as $row ):?>
		        <tr>
		            <td><?php echo $row['nazvanie'];?></td>
		            <td><?php echo $row['nomer_jurnala'];?></td>
		            <td><?php echo $row['data_vixoda'];?></td>
		            <td><button class="btn btn-sm btn-success" onclick="relate(this,'<?php echo $row['id'];?>','jurnal','<?php echo $chek_otpravki['data'][0]['id'];?>')" 
		            	<?php echo ($chek_otpravki['status']==1?($row['id']==$chek_otpravki['data'][0]['jurnal']?'disabled':''):'');?>>Privyazka</button></td>
		        </tr>
<?php endforeach;?>
		    </tbody>
		</table>
	</div>
	</div>
</div>

<?php include("includes/footer.php");?>
<script type="text/javascript">
var aurl = "/view.php";

$.expr[':'].icontains = $.expr.createPseudo(function( text ) {
    text = text.toLowerCase();
    return function (el) {
        return ~$.text(el).toLowerCase().indexOf( text );
    }
});

function relate(obj, id, table, file) {
  $.ajax({    
    method: 'POST',
    url: aurl,
    data: {id: id, table: table, action: table + '_' + file},
    success: function (response) {
      location.reload();
    }
  });
}

$("#check_otpravki_reg").submit(function(e) {
  
  e.preventDefault();
  var form = $(this);
  var data = form.serialize();
  var data = {};
  var agr = [];
  $.each(form.serializeArray(), function (i, field) {
  	data[field.name] = field.value;
  });
  
  console.log(data);
  $.ajax({
    type: "POST",
    dataType: 'json',
    url: aurl,
    data: data,
    success: function(response) {      
      location.reload();
    }
  });
});

$("#podpischik_search").keyup(function () {
    var data = this.value.split(" ");
    var jo = $("#podpischik_body").find("tr");
    if (this.value == "") {
        jo.show();
        return;
    }
    jo.hide();
    jo.filter(function (i, v) {
        var $t = $(this);
        for (var d = 0; d < data.length; ++d) {
            if ($t.is(":icontains('" + data[d].toLowerCase() + "')")) {
                return true;
            }
        }
        return false;
    })
    .show();
}).focus(function () {
    this.value = "";
    $(this).css({
        "color": "black"
    });
    $(this).unbind('focus');
}).css({
    "color": "#C0C0C0"
});

$("#podpiska_search").keyup(function () {
    var data = this.value.split(" ");
    var jo = $("#podpiska_body").find("tr");
    if (this.value == "") {
        jo.show();
        return;
    }
    jo.hide();

    jo.filter(function (i, v) {
        var $t = $(this);
        for (var d = 0; d < data.length; ++d) {
            if ($t.is(":icontains('" + data[d].toLowerCase() + "')")) {
                return true;
            }
        }
        return false;
    })
    .show();
}).focus(function () {
    this.value = "";
    $(this).css({
        "color": "black"
    });
    $(this).unbind('focus');
}).css({
    "color": "#C0C0C0"
});
$("#jurnal_search").keyup(function () {
    var data = this.value.split(" ");
    var jo = $("#jurnal_body").find("tr");
    if (this.value == "") {
        jo.show();
        return;
    }
    jo.hide();

    jo.filter(function (i, v) {
        var $t = $(this);
        for (var d = 0; d < data.length; ++d) {
            if ($t.is(":icontains('" + data[d].toLowerCase() + "')")) {
                return true;
            }
        }
        return false;
    })
    .show();
}).focus(function () {
    this.value = "";
    $(this).css({
        "color": "black"
    });
    $(this).unbind('focus');
}).css({
    "color": "#C0C0C0"
});
</script>
</body>
</html>