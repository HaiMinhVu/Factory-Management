<?php
include('dbconnect.php');
include('functions.php');
include('header.php');
?>

	<div class="panel panel-default">
		<div class="panel-heading">
        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
            	<div class="row">
                	<h3 class="panel-title"><font color="#2775F5">Sample Records List</font></h3>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <div class="row" align="right">
                    <button type="button" name="back" id="back" class="btn btn-success btn-xs" onclick="window.history.back()">Back</button> 	
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
		<div class="panel-body">
			<form method="POST" id="samplerecord_add_form">
			<table id="samplerecord_data" class="table table-bordered table-striped">
				<tr>
					<td width=10%>Type</td>
					<td width=40%>
            			<select name="type" id="type" class="selectpicker" data-live-search="true"class="form-control" required>
                                <option value="">Select Type</option>
                        		<option value="Quote">Quote</option>
                        		<option value="P.O">P.O</option>
                        		<option value="Invoice">Invoice</option>
                        		<option value="Payment">Payment</option>
                       	</select></td>
            		<td width=10%>Date Request</td>
            		<td><input type="date" name="daterequested" id="daterequested" class="form-control" value="<?php echo date('Y-m-d') ;?>" /></td>
				</tr>
				<tr>
					<td width=10%>Sample</td>
					<td width=40%><select name="sid" id="sid" class="selectpicker" data-live-search="true" required>
                                    <option value="">Select Sample</option>
                                    <?php echo sample_option_list($dbconnect);?>
                    	</select>
						<button type="button" name="addsample" id="addsample" class="btn btn-success btn-xs" onclick="window.location.href='sample_add.php'">Add</button></td></td>
            		<td width=10%>Est Deliver</td>
            		<td><input type="date" name="estdeliver" id="estdeliver" class="form-control" value="<?php echo date('Y-m-d') ;?>" /></td>
				</tr>
            	<tr>
					<td width=10%>Request From</td>
					<td width=40%>
            			<select name="eid" id="eid" class="selectpicker" data-live-search="true" required>
                                    <option value="">Select Vendor</option>
                                    <?php echo entity_option_list($dbconnect);?>
                    	</select>
						<button type="button" name="addvendor" id="addvendor" class="btn btn-success btn-xs" onclick="window.location.href='vendor_add.php'">Add</button></td>
            		<td width=10%>Arrival Date</td>
            		<td><input type="date" name="arrivaldate" id="arrivaldate" class="form-control" value="<?php echo date('Y-m-d') ;?>" /></td>
				</tr>
            	<tr>
					<td width=10%>Quantity</td>
					<td width=40%><input type="number" name="quantity" id="quantity" class="form-control" pattern="[0-9]+" placeholder="Number 0-9 Only" required /></td>
            		<td width=10%>Payment Term</td>
            		<td><input type="text" name="paymentterm" id="paymentterm" /></td>
				</tr>
            	<tr>
					<td width=10%>Price/Unit</td>
					<td width=40%><input type="number" name="priceperunit" id="priceperunit" class="form-control" pattern="[0-9.]+" placeholder="500.00" /></td>
            		<td width=10%>Warranty Term</td>
            		<td><input type="text" name="warrantyterm" id="warrantyterm" /></td>
				</tr>
            	<tr>
					<td width=10%></td>
					<td width=40%></td>
            		<td width=10%>Shipping Term</td>
            		<td><input type="text" name="shippingterm" id="shippingterm" /></td>
				</tr>
			</table>
			<div style="text-align:center">
				<span id="alert_action"></span>
            	<input type="submit" name="Add" id="Add" class="btn btn-info" value="Add" />
            	<input type="button" name="reset" id="reset" class="btn btn-warning" value="Reset" onClick="window.location.reload()" />
			</div>
            </form>
		</div>
	</div>

<script>
$(document).ready(function(){
	$('#samplerecord_add_form').submit(function(event){
        event.preventDefault();
    	var action="Add";
        var data = $('#samplerecord_add_form').serialize()+"&action="+action;
        $.ajax({
            type:"post",
            url:"samplerecord_action.php",
            data:data,
            success: function(mess){
                $('#alert_action').fadeIn().html(mess);
                window.setTimeout(function(){location.reload()},2000)
            }
        });
    });

	$('#paymentterm').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
	});
	$('#warrantyterm').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
	});
	$('#shippingterm').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
	});
});
</script>


<?php
include ('footer.php');
?>