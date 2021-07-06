function onCardChange(val) {

    var count = val.length;
    if (count == 16) {
        var hell = val.split('');
        //alert(hell[0]);
        var text = document.getElementById("cname");
        switch (hell[0]) {
            case '4':
                //alert('visa');

                text.value = "Visa"

                break;
            case '5':
                //alert('master');
                text.value = "Master Card"
                break;
            case '3':
                //alert('master');
                text.value = "American Express"
                break;
            case '6':
                //alert('master');
                text.value = "Discover"
                break;
            default:
                alert('Enter a valied card number!');

        }
    }



}