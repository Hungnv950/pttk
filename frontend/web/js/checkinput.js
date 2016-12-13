/**
 * Created by haiye_000 on 13-Dec-16.
 */
(function () {
    var allData,eat,shift;
    var table_had = [];
    $.ajax({
        method: "GET",
        url: "/pttk/api/v1/users"
    }).done(function (data) {
        allData=data;
        console.log(data);
    });

    $('#booking-eat_time').change(function () {
        /// xem thoi gian va sua lai the select
        // console.log( date=allData.items[0].eat_time.split(' ')[0]==$(this).val());
        eat=$(this).val();
        alone();
    });
    $('#booking-shift').change(function() {
        shift=$(this).val();
        alone();
    });

    function alone() {
        for (enable in table_had) {
            $('#booking-table_id input[value='+ table_had[enable] +']').removeAttr('disabled','disabled');
        }
        table_had = [];
        for (time in allData.items) {
            if (allData.items[time].eat_time.split(' ')[0] == eat
                && allData.items[time].shift == shift) {
                if (allData.items[time].eat_time == null
                    || allData.items[time].shift == null) {
                    // su ly khi 1 cai la rong
                }else {
                    table = allData.items[time].table_id.split(" ");
                    // numb = allData.items[time].table_id.match(/\d/g);
                    for (i in table) {
                        table_had.push(table[i]);
                    }
                    // string = string.concat(allData.items[time].table_id);
                    // console.log(table);
                }
            }
        }
        console.log(table_had);
        for (had in table_had) {
            $('#booking-table_id input[value='+ table_had[had] +']').attr('disabled','disabled');
        }

    }

})();