/**
 * Created by haiye_000 on 13-Dec-16.
 */
(function () {
    var allData;
    $.ajax({
        method: "GET",
        url: "/pttk/api/v1/users"
    }).done(function (data) {
        allData=data;
        console.log(data);
    });

    //var

    $('#booking-eat_time').change(function () {
        /// xem thoi gian va sua lai the select
        console.log( date=allData.items[0].eat_time.split(' ')[0]==$(this).val());
        console.log($(this).val());
    });

})();