$(document).ready(function () {
    $(".js-switch").each(function () {
        new Switchery(this)
    })
})

//body altında js-switch classına sahip item'ın durumunda bir değişiklik varsa
$("body").on("change", ".js-switch", function () {

    var $complated = $(this).is(":checked");
    //Verinin gelip gelmediği kontrol edildi.
    /* alert($complated); */

    var $url = $(this).data("url");

    //Controller içindeki metot ve id'nin  gelip gelmediği kontrol edildi.
    /* alert($url); */


    //Post Metodunun Yapısı
    //1:Url
    //2:Veri
    //3:Geri Dönüşünde Yapılacak İşlem
    $.post($url, { complated: $complated }, function (response) {

        /* alert(response); */

    })


})
let $dataurl = "";
let $id = "";
$(".dltbtn").on("click", function (e) {

    $dataurl = $(this).data("url");
    $id = $(this).data("id");
    /*  e.preventDefault(); */
    $('#confirmModal').modal("show")

})
$('#delete').on("click", function (e) {

    $.get($dataurl, {}, function (response) {

        /* alert(response); */

        $('#confirmModal').modal("hide")
        $("#t" + $id).removeAttr('class');
        $("#t" + $id).css("background-color", "red").delay(500);
        $("#t" + $id).animate({ opacity: "hide" }, "slow");;

    })
})