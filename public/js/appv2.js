console.log("cek js");
// $(".select2").select2({
//     width: "100%",
// });
$(document).ready(function ($) {
    //#region mask

    $(".datepicker").datepicker({
        autoclose: true,
        todayHighlight: true,
        enableOnReadonly: false,
        zIndexOffset: 9999999,
        format: "dd/mm/yyyy",
    });

    $(".yearpicker").datepicker({
        autoclose: true,
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        zIndexOffset: 9999999,
        enableOnReadonly: false,
    });

    $(".datemask").mask("00/00/0000", {
        placeholder: "dd/mm/yyyy",
        separator: "/",
    });

    $(".yearmask").mask("0000", {
        placeholder: "yyyy",
    });

    $(".money").inputmask({
        // rightAlign: false,
        // digits: 4,
        alias: "decimal",
        groupSeparator: ".",
        autoGroup: true,
        autoUnmask: true,
    });
    //#region mask

    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "300",
        timeOut: "4000",
    };

    var moneyRegex1 = /\B(?=(\d{3})+(?!\d))/g;
    // var moneyRegex2 = /\B(?=(\d{3})+(\.(\d)))/g;

    function moneyFormat(val) {
        return val.toString().replace(moneyRegex1, ",");
    }

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

    function dateFormat(val) {
        return new Date(val).toLocaleDateString("en-GB");
    }

    function timeFormat(val) {
        return new Date(val).toLocaleTimeString("en-GB");
    }

    async function axiosrequest(url, method = "get", data = null) {
        if (method == "get")
            return await axios
                .get(url)
                .then((res) => res.data)
                .catch((err) => {
                    $("body").removeClass("loading");
                    toastr.error(err.message);
                });
        else if (method == "post")
            return await axios
                .post(url, data)
                .then((res) => res.data)
                .catch((err) => {
                    $("body").removeClass("loading");
                    toastr.error(err.message);
                });
        else if (method == "put")
            return await axios
                .put(url, data)
                .then((res) => res.data)
                .catch((err) => {
                    $("body").removeClass("loading");
                    toastr.error(err.message);
                });
        else if (method == "delete")
            return await axios
                .delete(url)
                .then((res) => res.data)
                .catch((err) => {
                    $("body").removeClass("loading");
                    toastr.error(err.message);
                });
    }

    function roundFloatNumber(val) {
        return parseFloat(parseFloat(val).toFixed(10));
    }

    $(".general-datatable").DataTable({
        paging: true,
        order: [],
        dom: '<"top"f>rt<"bottom"lip><"clear">',
        lengthMenu: [
            [10, 25, 50, 100, -1],
            ["10 rows", "25 rows", "50 rows", "100 rows", "Show all"],
        ],
    });

    $(document).ready(async function () {
        var role = $('meta[name="user-role"]').attr("content");
        role = role.toLowerCase();
        // console.log("🚀 ~ file: main.js ~ line 120 ~ role", role)

        if (_.includes(["admin", "nasre", "facultative"], role)) {
            var res = await axiosrequest(
                route("reporting.facultative.reminder.getDueDocument"),
                "post"
            );
            // console.log("🚀 ~ file: main.js ~ line 125 ~ res", res)
            if (res.length > 0) $("#reporting-facultative-notification").show();
        }
    });
});
