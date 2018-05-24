<?php
include 'header.php';
?>


<div style="position: relative; height: 300px;">


    <div id="grid2" style="position: absolute; top:70%; ; left: 0px;width: 49.9%; height: 300px; direction: rtl"></div>
    <div id="grid1" style="position: absolute; right:  0px; width: 49.9%; height: 300px; direction: rtl"></div>
    <div id="layout" style="position: absolute;width: 50%; left: 0px;  height: 200px; direction: rtl"></div>


</div>

<script type="text/javascript">


    $(function () {


        $('#grid2').w2grid({

            header: 'Details',
            show: { header: true, columnHeaders: true },
            name: 'grid2',
            columns: [
                { field: 'recid', caption: '#', size: '50px', sortable: true, attr: 'align=center' },
                { field: 'item', caption: 'Name', size: '100px',  attr: "align=right" },
                { field: 'price', caption: 'Price', size: '100px' },
                { field: 'quantity', caption: 'الكمية', size: '100px' }
            ]
        });


        $('#grid1').w2grid({
            name: 'grid1',
            header: 'الفواتير',
            show: { header: true , toolbar:true, footer:true},
            searches:[{field:"recid", type:'int'}],
            columns: [
                { field: 'recid', caption: 'رقم الفاتورة', size: '100px', sortable: true, attr: 'align=center' },
               // { field: 'id', caption: 'ID', size: '50px', sortable: true, attr: 'align=center' },
                { field: '_date', caption: 'التاريخ', size: '30%', sortable: true },
                { field: 'total_price', caption: 'الإجمالي', size: '30%', sortable: true },
                { field: 'paid', caption: 'المدفوع', size: '40%' }

            ],
            records:
                [ //{ recid: "115", _date: 'John', total_price: 'doe', paid: 'jdoe@gmail.com'},
                     //{ recid: "155", _date: 'John', total_price: 'doe', paid: 'jdoe@gmail.com'},
                     //{ recid: "255", _date: 'John', total_price: 'doe', paid: 'jdoe@gmail.com'}

                     ]// bills
             ,
            onClick: function (event) {

                var record = this.get(event.recid);

                var discount = record.discount;
                if(discount!=0 && record.total_price - record.discount != record.after_discount)
                    discount="%"+discount;
                var table = "<table style='width: 100%'><tr>" +
                    "<td style='width: 15%'>الإجمالي</td><td style='width: 15%'>" + record.total_price+"</td>"+
                    "<td style='width: 15%'>التخفيض</td><td style='width: 15%'>" +  discount+"</td>"+
                    "<td style='width: 25%'>الإجمالي بعد التخفيض</td><td style='width: 15%'>" + record.after_discount+"</td>"+
                        "</tr><tr>"+
                "<td>المدفوع</td><td>" + record.paid+"</td>"+
                    "<td>المتبقي</td><td>"+record.remainder+ "</td></tr></table>"
                w2ui['layout'].content('top', table)

                w2ui['grid2'].header = 'أصناف الفاتورة رقم '+event.recid;
                $.postJSON("get_bill_elements/" + event.recid ,{}, function (data) {
                    if (data.msg != undefined && data.msg == "ERROR") {
                        alert("Nooooooooooo")
                    } else {
                   //     console.log(data)

                        w2ui['grid2'].clear();
                        //var record = this.get(event.recid);
                        w2ui['grid2'].add(data);
                     //   addRec(data.name, data.id, data.price);
                       // id_quantity[data.id] = data.quantity;
                    }



                });



            },
            onSearch : function (event) {
                //alert("Hay")
                console.log(event.searchData[0].value)
                w2ui['grid1'].click(event.searchData[0].value);
            },
            onChange : function (event) {
                alert("Way")

            }
        });

    });




    $.postJSON("get_bills/"+"0",{}, function (data) {
        if (data.msg != undefined && data.msg == "ERROR") {
            alert("Nooooooooooo")
        } else {

            w2ui['grid1'].add(data);

         //   console.log(data)
            //addRec(data.name, data.id, data.price);
            //id_quantity[data.id] = data.quantity;
        }



    });



    $(function () {
        var pstyle = 'border: 1px solid #dfdfdf; padding: 5px;';
        $('#layout').w2layout({
            name: 'layout',
            panels: [
                { type: 'top', size: 200, resizable: true, style: pstyle, content: ''	, title: 'بيانات الفاتورة' },

            ]
        });
    });


</script>


</body>
</html>