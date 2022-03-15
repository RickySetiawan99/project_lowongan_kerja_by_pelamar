function ajaxProses(method, option, ele = null, eve = null) {
    if (method == "post") {
        if (option.type == "swal") {
            swal.fire(option.attr).then(function (result) {
                if (result.value) {
                    if (
                        option.attrChild != undefined ||
                        option.attrChild != null
                    ) {
                        Swal.fire(option.attrChild).then(result => {
                            if (result.value) {
                                // KTApp.block(option.blkUi, {
                                //     overlayColor: "#000000",
                                //     type: "v2",
                                //     state: "success",
                                //     message: "Please wait..."
                                // });

                                $.ajaxSetup({
                                    headers: {
                                        "X-CSRF-TOKEN": $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content")
                                    }
                                });

                                $.post(
                                    option.route, {
                                        note: result.value
                                    },
                                    function (res) {
                                        swal.fire(
                                            res.status == 1 ?
                                            "Berhasil" :
                                            "Gagal",
                                            res.message,
                                            res.status == 1 ?
                                            "success" :
                                            "error"
                                        );

                                        if (res.status == 1) {
                                            // setTimeout(function () {
                                            //     KTApp.unblock(option.blkUi);
                                            // }, 1000);

                                            $(".reload").trigger("click");
                                            $(".scrolltop").trigger("click");
                                        } else {
                                            $(".scrolltop").trigger("click");

                                            // setTimeout(function () {
                                            //     KTApp.unblock(option.blkUi);
                                            // }, 1000);
                                        }
                                    },
                                    "json"
                                );
                            }
                        });
                    } else {
                        var param = {
                            route: option.route,
                            data: option.data,
                            blkUi: option.blkUi,
                            type: option.type
                        };

                        ajaxx(param);
                    }
                }
            });
        } else if (option.type == "ajax") {
            var param = {
                route: option.route,
                data: option.data,
                blkUi: option.blkUi,
                file: option.file,
                type: option.type,
                extn: option.extn,
                html: option.html,
                rnder: option.rnder
            };

            ajaxx(param);
        }
    } else if (method == "get") {}
}

function ajaxx(param) {
    // if(param.html == undefined){
    // KTApp.block(param.blkUi, {
    //     overlayColor: "#000000",
    //     type: "v2",
    //     state: "success",
    //     message: "Please wait..."
    // });
    // }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.post(
        param.route,
        param.data,
        function (res) {
            if (param.html == true) {
                $(param.rnder).html(res);

                // setTimeout(function () {
                //     KTApp.unblock(param.blkUi);
                // }, 1000);
            } else {
                if (param.type == "swal") {
                    swal.fire(
                        res.status == 1 ? "Berhasil" : "Gagal",
                        res.message,
                        res.status == 1 ? "success" : "error"
                    );
                }

                // setTimeout(function () {
                //     KTApp.unblock(param.blkUi);
                // }, 1000);

                if (res.status == 1) {
                    if (param.file != undefined) {
                        if (param.extn == "pdf") {
                            var anchor = document.createElement("a");
                            anchor.href = param.file;
                            anchor.target = "_blank";
                            anchor.download = "users.pdf";
                            anchor.click();
                        } else {
                            window.location.href = param.file;
                        }
                    } else {
                        if (res.cus_url == undefined) {
                            $(".reload").trigger("click");
                        } else {
                            $(".reload").attr("href", res.cus_url);
                            $(".reload").trigger("click");
                        }
                    }
                }
            }

            $(".scrolltop").trigger("click");
        },
        param.html == undefined ? "json" : "html"
    );
}