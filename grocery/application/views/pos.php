<!DOCTYPE html>
<html>


<head>
	<title>
		Pos Sys
	</title>


	<link rel="stylesheet" type="text/css" href=<?php print base_url()."assets/w2ui/w2ui.css"?> />
	<link rel="stylesheet" type="text/css" href=<?php print base_url()."assets/css/buttons_style.css"?> />
	<script src="<?php print base_url()."assets/jquery.js"?>"></script>
	<script src="<?php print base_url()."assets/w2ui/w2ui.js"?>"></script>


<style>


	 *{
		font-size:18px;

	 }



	.btn2{

		width:1%;
		font-size: 48px;
		height:50px;
		background-color: skyblue;
		color: blue;
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


<div id="pos_desk" align="center">
<br />
	<div id="input_barcode" style="width: 500px" align="left">
	<input type="text" id="item_data" style="direction: ltr"  onchange="getAndAddItem()" />
	<span id="error" style="display: inline-block;width: 100px" ></span><br /><br />

	</div>

<div id="grid" style="height: 450px; width: 60%; float: left;" ></div>



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


	<div class="w2ui-field w2ui-span8" style="clear: both; text-align: center;">


		الإجمالي <input  type="text" id="totalBillPrice" value="0" style="margin: 10px" />

	</div>
</div>

</body>
<script>

	var selectedRow = 0;


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

			$.getJSON("Get_item_pos?item_id=" + item_arr[0], function (data) {
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
		}

	}


	function removeRow() {

		if(selectedRow==0) return false;

		$("#totalBillPrice").val(parseInt($("#totalBillPrice").val()) - parseInt(w2ui['grid'].get(selectedRow).totalPrice)  );
		w2ui['grid'].remove(selectedRow);
		w2ui['grid'].selectNone();



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

		console.clear()
		/*for(var a in w2ui['grid'].records)
			console.log("name = "+w2ui['grid'].records[a].name+"  "+w2ui['grid'].records[a].totalPrice)
			*/
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
</html>