// window.onload(hello());


// function hello(){
//     var select1 = document.getElementById('select1');
//     var value1 = select1.value;
//     //alert(value1);

//     var select2 = document.getElementById('select2')
//     select2.innerText = value1;

// }

//window.onload(this.hello(value='',ID=''));
var additional_item_price;
var id;

function hello(value, ID) {
    // var select1 = document.getElementById('select1');
    // select2.innerText = value1;
    //(value1);
    //alert(ID);
    console.log(value);
    console.log(ID);
    var price_id = '#price_' + ID;
    var select1 = document.getElementById(`${ID}_hi`)
    $(price_id).val(value);
    select1.innerText = value;
    id = ID
        //alert(id)
}

// function AdditionalItem(valuer) {
//     // alert(valuer);
//     var regular = document.getElementById("regular");
//     var combo = document.getElementById("combo");
//     var blaster = document.getElementById("blaster");

//     regular.innerText = "Regular LKR " + valuer;
//     combo.innerText = "Combo LKR " + valuer * 2;
//     blaster.innerText = "Blaster LKR " + valuer * 3;

//     regular.value = valuer;
//     combo.value = valuer * 2;
//     blaster.value = valuer * 3;

// }


function AdditionalItem(valuer, ) {
    // var aditional_item_quantity = document.getElementsByName('additional_item_quantity');
    // console.log(aditional_item_quantity.id);

    // var regular = document.getElementById("regular");
    // var combo = document.getElementById("combo");
    // var blaster = document.getElementById("blaster");

    // regular.innerText = "Regular LKR " + valuer;
    // combo.innerText = "Combo LKR " + valuer * 2;
    // blaster.innerText = "Blaster LKR " + valuer * 3;


    // regular.value = valuer;
    // combo.value = valuer * 2;
    // blaster.value = valuer * 3;
    additional_item_price = valuer;
    var add = document.getElementById('additional_item_quantity_' + id);
    var tag = `<option value="${additional_item_price}">LKR.${additional_item_price}.00</option><option value="${additional_item_price*2}">LKR.${additional_item_price*2}.00</option><option value="${additional_item_price*3}">LKR.${additional_item_price*3}.00</option>`;
    add.innerHTML = tag;

}

function AdditionalItem1() {

}


// function additional_item_quantity(val){
//     //sdocument.getElementById('additional_item_quantity');
//      var additinal = document.getElementById('additional_item_quantity');
//     // alert("hello");
//     additinal.innerText = val;
//     // var para = document.createElement("li");
//     // var t = document.createTextNode(val);
//     // para.appendChild(t);
//     // document.getElementById('additional_item_quantity').appendChild(para);
// }
$(".item_quantity").bind('keyup mouseup', function() {
    //console.log($(this).val());
    var quantity = $(this).val();
    var ID = $(this).attr('id');
    var price_id = '#price_' + ID;
    var price = $(price_id).val();
    var portion_price = $('select#' + ID).val();

    var new_price = portion_price * quantity;
    var price_holder = '#' + ID + '_hi';
    $(price_id).val(new_price);
    $(price_holder).html(new_price);
});

document.getElementById("bill").onclick = function() {
    alert("Sorry, Please Log First!!!");
    location.href = "login_signin/login1.php";

}

// function ha() {
//     var bill = document.getElementsByName("pay");
//     alert('hdsgceda');
// }