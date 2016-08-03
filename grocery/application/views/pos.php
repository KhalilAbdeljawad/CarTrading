<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<title>
		Pos Sys
	</title>


	<link rel="stylesheet" type="text/css" href=<?php print base_url()."assets/w2ui/w2ui.css"?> />
	<link rel="stylesheet" type="text/css" href=<?php print base_url()."assets/css/buttons_style.css"?> />
<!--	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">-->


	<script src="<?php print base_url()."assets/jquery.js"?>"></script>
	<script src="<?php print base_url()."assets/w2ui/w2ui.js"?>"></script>




	<!-- for numpad -->
	<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
	<!-- Bootstrap -->



	<link rel="stylesheet" type="text/css" href=<?php print base_url()."assets/css/bootstrap.min.css"?> />
	<link rel="stylesheet" type="text/css" href=<?php print base_url()."assets/css/bootstrap-theme.min.css"?> />
	<link rel="stylesheet" type="text/css" href=<?php print base_url()."assets/css/jquery.numpad.css"?> />

	<!--	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">-->

	<script src="<?php print base_url()."assets/js/bootstrap.min.js"?>"></script>
	<script src="<?php print base_url()."assets/js/jquery.numpad.js"?>"></script>


	<style type="text/css">
		.nmpd-grid {border: none; padding: 20px}
		.nmpd-grid>tbody>tr>td {border: none;}

		/* Some custom styling for Bootstrap */
		.qtyInput {display: block;
			width: 100%;

			padding: 6px 12px;
			color: #555;
			background-color: white;
			border: 1px solid #ccc;
			border-radius: 4px;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
			-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
			transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		}
	</style>


	<style>


	 *{
		font-size:18px;

	 }



	button{

		width:1%;
		font-size: 48px;
		height:50px;

		margin: 10px;
	}

	.btntext{
		color: #0066FF;;
		font-size: 56px;
		line-height: 30px;
	}


	#pos_keypad{

		height: 400px;
		padding:20px;
	}

	.space{
		margin: 10px;

	}

	#grid{
		overflow-y: auto;
		overflow-x: hidden;
	}



</style>






</head>
<body dir="rtl">


<div id="pos_desk" align="center" style="height: 100%;margin: 10px;">
<br />
	<div id="input_barcode" style="margin-left: 7.4%;width: 500px" align="left">
	<input type="text" id="item_data" style="direction: ltr"  onchange="getAndAddItem()" />
	<span id="error" style="display: inline-block;width: 100px" ></span><br />

	</div>

<div id="grid" style="height:450px; width: 60%; float: left;" ></div>



<div class="w2ui-buttons" id="pos_keypad" style="text-align: left">
	<span class="space"></span>
	<button class="btn btn2" name="inc"  onclick="incQuantity()"><span class="btntext">+</span></button>
	<br /><br />
	<span class="space"></span>
	<button class="btn btn2" name="dec"  onclick="decQuantity()"><span class="btntext">-</span></button>
	<br /><br />

	<span class="space"></span>
	<button class="btn btn2" name="remove"  onclick="removeRow()"><span class="btntext">/</span></button>
	<br /><br />

	<span class="space"></span>
	<button class="btn btn2" name="clear"  onclick="clearGrid()"><span class="btntext">*</span></button>
	<br /><br />
	<span class="space"></span>

	<button class="btn btn2" name="add" onclick="addRec()">Add</button>

</div>


	<div class="w2ui-field w2ui-span8" style="clear: both; text-align: left;width: auto;margin-left: 5%">

		<button class="btn btn2" onclick="sell()">بيع</button>
		الإجمالي <input  type="text" id="totalBillPrice"  readonly="readonly" value="0" style="width: 10%;margin: 10px" />
		التخفيض <input  type="text" id="discount" onchange="calcDiscount()" value="0" style="width: 10%;margin: 10px" />
		بعد التخفيض<input  type="text" readonly="readonly" id="afterDiscount" value="0" style="width: 10%;margin: 10px" />
		<br />
		المدفوع<input  type="text" onchange="updateRemainder()" id="paid" value="0" style="width: 10%;margin-right: 10px; margin-left: 44px" />
		المتبقي<input  type="text" id="remainder" readonly="readonly" value="0" style="width: 10%;margin-right: 10px;margin-left: 15px" />


	</div>
</div>

</body>
<script>

	var selectedRow = 0;

	$("#totalBillPrice").val(0);
	$("#discount").val(0);
	$("#paid").val(0);
	$("#remainder").val(0);


	jQuery.extend({
		postJSON: function( url, data, callback) {
			return jQuery.post(url, data, callback, "json");
		}
	});

	///////Remove this code //////----------------------------------------------------------------------||||
	$.postJSON("handle_pos/test", {id:1, name:"Khalil"}, function (data) {
		console.log(data.msg)

	});


	function getExistedRow(id) {

		var i=0;

		for(var a in w2ui['grid'].records){

			if(w2ui['grid'].records[a]['id']==id)
				return w2ui['grid'].records[a]['recid'];
		}
		return false;

		/*
		while(true){

			var row = w2ui['grid'].records(i++);
			//alert("row = "+row)
			if(row==null) return false;
			row = w2ui['grid'].get(row);
			if(row.id==id)
				return row.recid;
		}
		*/
	}
	function getAndAddItem() {
		var item = $("#item_data").val();

		var item_arr = item.split(" ");

		$("#error").text("");

		var row_id=getExistedRow(item_arr[0]);
		//alert("is = "+row_id)
		if(row_id!=null && row_id!=false) {

			selectedRow = row_id;
			incQuantity();


		}else {

			$.postJSON("Handle_pos/get_item/" + item_arr[0],{}, function (data) {
				if (data.msg != undefined && data.msg == "ERROR") {
					$("#error").text(item + " " + "غير موجود")
				} else
					addRec(data.name, data.id, data.price);




			});
		}

		$("#item_data").val("");

	}
	function incQuantity() {

		if(selectedRow==0) return false;
		var record = w2ui['grid'].get(selectedRow);

		w2ui['grid'].set(selectedRow, { quantity: (parseInt(record.quantity)+1), totalPrice:(parseInt(record.quantity)+1)*record.price }, false);

		$("#totalBillPrice").val(parseInt($("#totalBillPrice").val())+parseInt(record.price));
		$("#paid").val($("#totalBillPrice").val());

	}


	function decQuantity() {

		if(selectedRow==0) return false;

		var record = w2ui['grid'].get(selectedRow);

		if(parseInt(record.quantity)>1) {
			w2ui['grid'].set(selectedRow, {
				quantity: (parseInt(record.quantity) - 1),
				totalPrice: parseInt(record.totalPrice) - record.price
			}, false);

			//if(parseInt($("#totalBillPrice").val())>0)
			$("#totalBillPrice").val(parseInt($("#totalBillPrice").val()) - parseInt(record.price));
			$("#paid").val($("#totalBillPrice").val());
		}

	}


	function removeRow() {

		if(selectedRow==0) return false;

		$("#totalBillPrice").val(parseInt($("#totalBillPrice").val()) - parseInt(w2ui['grid'].get(selectedRow).totalPrice)  );
		$("#paid").val($("#totalBillPrice").val());
		w2ui['grid'].remove(selectedRow);
		w2ui['grid'].selectNone();



	}

	function updateRemainder() {
		if($("#afterDiscount").val()==0)
			$("#remainder").val($("#totalBillPrice").val() - $("#paid").val())
		else
			$("#remainder").val($("#afterDiscount").val() - $("#paid").val())
	}

	function calcDiscount() {

		var disc = $("#discount").val();

		if(disc.indexOf("%")>0){
			disc=disc.substr(0, disc.indexOf("%"));
			$("#afterDiscount").val($("#totalBillPrice").val()-disc/100*$("#totalBillPrice").val());

		}
		else
			$("#afterDiscount").val($("#totalBillPrice").val() - disc)

		$("#paid").val($("#afterDiscount").val());


	}


	function clearGrid() {
		w2confirm({
			msg          : "هل تريد إلغاء العملية الحالية؟",
			title        : w2utils.lang('إلغاء عملية البيع'),
			width        : 300,       // width of the dialog
			height       : 160,       // height of the dialog
			yes_text     : 'نعم',     // text for yes button
			yes_class    : '',        // class for yes button
			yes_style    : '',        // style for yes button
			yes_callBack : function () {
				w2ui['grid'].clear();
				$("#totalBillPrice").val(0);
			},      // callBack for yes button
			no_text      : 'لا',      // text for no button
			no_class     : '',        // class for no button
			no_style     : '',        // style for no button
			no_callBack  : null,      // callBack for no button
			callBack     : null       // common callBack
		})

	}
	var recId=1
	function addRec(name, id, price) {
		w2ui['grid'].add({ recid: recId++, name: name, id:id, price: price, quantity: 1, totalPrice: price});

		$("#totalBillPrice").val(parseInt($("#totalBillPrice").val())+parseInt(w2ui['grid'].get(recId-1).price));
		$("#paid").val($("#totalBillPrice").val());

		console.clear()
		console.log(w2ui['grid'].records);


	}

	function sell() {

		var json ;//= JSON.stringify(w2ui['grid'].records);


		json = "[";
		var temp ;
		var first = 1;
		for(var a in w2ui['grid'].records) {
			temp = w2ui['grid'].records[a];
			if(first++>1) json+=",";
			json+='{"id":'+temp.id+', "price":'+temp.price+', "quantity":'+temp.quantity+'}'
			//console.log("name = " + w2ui['grid'].records[a].name + "  " + w2ui['grid'].records[a].totalPrice)
		}
		json+="]";
		json+=',"total_price":"'+$("#totalBillPrice").val()+'"';
		json+=',"discount":"'+$("#discount").val()+'"';
		json+=',"after_discount":"'+$("#afterDiscount").val()+'"';
		json+=',"paid":"'+$("#paid").val()+'"';
		json+=',"remainder":"'+$("#remainder").val()+'"';



		console.log("json2 = "+json);


		json = JSON.parse('{"items":'+json+'}')
		console.log(json)
		$.postJSON("handle_pos/save_bill", json, function (data) {

			console.log("Hellooooooooooooo");
			alert(data)

			/*if (data.msg != undefined && data.msg == "ERROR") {
				$("#error").text(item + " " + "غير موجود")
			} else
				addRec(data.name, data.id, data.price);
*/



		});

	}

	$('#grid').w2grid({
		name   : 'grid',
		style: 'font-size: 24px;color:blue;text-align:center',
		show: {
			header         : true,



			lineNumbers    : true,


		},

		columns: [

			{ field: 'name', caption: 'البيان', size: '30%' , attr:'align=center'},
			{ field: 'id', caption:'المعرف', size:'10%', attr:'align=center'},
			{field: 'quantity', caption:'الكمية', size:'10%', attr:'align=center'},
			{ field: 'price', caption: 'السعر', size: '10%' , attr:'align=center'},
			{ field: 'totalPrice', caption: 'الإجمالي', size: '12%', attr:'align=center' }

		],
		records: [
			//{ recid: 1, name: "name", id : 100, price: 5, quantity: 1, totalPrice: 12}
		],
		onClick: function (event) {

			selectedRow = event.recid;

			//alert(selectedRow);
			var record = this.get(event.recid);
			//alert(record.fname);
			/*
			w2ui['grid2'].add([
				{ recid: 0, name: 'ID:', value: record.recid },
				{ recid: 1, name: 'First Name:', value: record.fname },
				{ recid: 2, name: 'Last Name:', value: record.lname },
				{ recid: 3, name: 'Email:', value: record.email },
				{ recid: 4, name: 'Date:', value: record.sdate }
			]
			*/

		}
	});



</script>
<script src="<?php print base_url()."assets/js/numpad.js"?>"></script>
</html>