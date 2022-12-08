$("#datatable").DataTable({
    paging: true,
    order: [],
    dom: '<"top"f>rt<"bottom"lip><"clear">',
    lengthMenu: [
        [10, 25, 50, 100, -1],
        ["10 rows", "25 rows", "50 rows", "100 rows", "Show all"],
    ],
});

function labelMoneyFormat(val) {
    if (val.toString().includes(".")) {
        var _val = val.toString().split(".");
        var _num = moneyFormat(_val[0]);
        var _dec = _val[1] ?? "00";
        return _num + "." + _dec;
    } else {
        return moneyFormat(parseFloat(roundFloatNumber(val)).toFixed(2));
    }
}
function roundFloatNumber(val) {
    return parseFloat(parseFloat(val).toFixed(10));
}
var moneyRegex1 = /\B(?=(\d{3})+(?!\d))/g;

function moneyFormat(val) {
    return val.toString().replace(moneyRegex1, ",");
}
var total = $("#total").val();
$("#grand_total span").html(
    "Rp " + labelMoneyFormat(parseFloat(total) + parseFloat(20000), 2)
);

$("input[type=radio][name=type_pengiriman]").change(function () {
    if (this.value === "20000") {
        $("#grand_total span").html(
            "Rp " + labelMoneyFormat(parseFloat(total) + parseFloat(20000), 2)
        );
    } else {
        $("#grand_total span").html(
            "Rp " + labelMoneyFormat(parseFloat(total) + parseFloat(40000), 2)
        );
    }
});

function updateCart() {
    $("#update-cart").submit();
}
