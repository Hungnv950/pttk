/**
 * Created by haiye_000 on 14-Dec-16.
 */
$(document).ready(function() {
    var user_pr = $('#user_pr').text();
    console.log(user_pr);
    if (user_pr == 'null' || user_pr == '') {
        $("#myModal").modal('show');
    } else {
        $("#myModal").modal('hide');
    }
});
