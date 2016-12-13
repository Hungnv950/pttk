/**
 * Created by haiye_000 on 10-Dec-16.
 */
$(document).ready(function () {
    $('#click').click(function () {
        $input_checked=$('input[name="table"]:checked');
        if($input_checked.length > 0){
            console.log($input_checked.length);
            for (var i=0;i<$input_checked.length; i++){

            }
           return confirm("Bạn chọn bàn ?");
        }
        else{
            alert("Bạn chưa chọn bàn!");
            return false;
        }
    });
});
